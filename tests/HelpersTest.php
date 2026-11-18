<?php

namespace Helpers\Tests;

use BadMethodCallException;
use Helpers\Illuminate\Support\Bases\BaseHelpers;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Arr;

final class HelpersTest extends TestCase
{
    private Filesystem $files;

    private string $fixture;

    private string $namespace;

    protected function setUp(): void
    {
        $id = bin2hex(random_bytes(8));
        $this->files = new Filesystem;
        $this->fixture = sys_get_temp_dir().DIRECTORY_SEPARATOR.'laravel-helpers-'.$id;
        $this->namespace = 'Fixture'.$id;

        $this->files->ensureDirectoryExists($this->fixture.'/bootstrap/cache');
        $this->files->ensureDirectoryExists($this->fixture.'/vendor/composer');
        $this->files->ensureDirectoryExists($this->fixture.'/application');
        $this->writeJson('composer.json', [
            'autoload' => ['psr-4' => [$this->namespace.'\\' => 'application/']],
        ]);

        // Exercise Laravel package discovery with the package's actual metadata.
        $package = json_decode($this->files->get(dirname(__DIR__).'/composer.json'), true, flags: JSON_THROW_ON_ERROR);
        $this->writeJson('vendor/composer/installed.json', [
            'packages' => [['name' => $package['name'], 'extra' => $package['extra']]],
        ]);

        parent::setUp();
    }

    public function createApplication(): Application
    {
        $app = Application::configure($this->fixture)->create();
        $app->useAppPath($this->fixture.'/application');
        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    protected function tearDown(): void
    {
        try {
            parent::tearDown();
        } finally {
            $this->files->deleteDirectory($this->fixture);
        }
    }

    public function testGeneratorsUseTheApplicationPathAndNamespaceWithoutReplacingFiles(): void
    {
        self::assertSame(Command::SUCCESS, $this->runCommand('helper:create', ['name' => 'sTR']));

        $path = $this->app->path('Helpers/Str.php');
        $contents = $this->files->get($path)."\n// A local customization.\n";
        $this->files->put($path, $contents);

        self::assertSame(Command::SUCCESS, $this->runCommand('helper:init'));
        self::assertSame(Command::SUCCESS, $this->runCommand('helper:init'));
        self::assertSame(Command::FAILURE, $this->runCommand('helper:create', ['name' => 'Str']));
        self::assertSame($contents, $this->files->get($path));
        self::assertDirectoryDoesNotExist($this->fixture.'/app/Helpers');

        self::assertSame(Command::SUCCESS, $this->runCommand('helper:create', ['name' => 'baseHelpers']));

        foreach (['Arr', 'BaseHelpers', 'Date', 'File', 'Number', 'Str'] as $name) {
            self::assertTrue(is_subclass_of($this->loadHelper($name), BaseHelpers::class));
        }
    }

    public function testInvalidNamesAndBlockedPathsReturnNonzeroExitCodes(): void
    {
        foreach (['../Outside', 'Text Tools', "Text\n", 'Class', 'String', 'Nul', 'fUncTiOnS'] as $name) {
            self::assertSame(Command::INVALID, $this->runCommand('helper:create', ['name' => $name]), $name);
        }

        self::assertDirectoryDoesNotExist($this->app->path('Helpers'));

        $this->files->ensureDirectoryExists($this->app->path('Helpers/Arr.php'));

        self::assertSame(Command::FAILURE, $this->runCommand('helper:init'));
        self::assertDirectoryExists($this->app->path('Helpers/Arr.php'));
        self::assertFileExists($this->app->path('Helpers/Str.php'));
    }

    public function testFunctionsFileIsLoadedOnceWhenTheApplicationBoots(): void
    {
        self::assertSame(Command::SUCCESS, $this->runCommand('helper:functions'));
        $path = $this->app->path('Helpers/Functions.php');
        $contents = <<<'PHP'
            <?php

            function laravel_helpers_test_application_path(): string
            {
                return app_path();
            }
            PHP;
        $this->files->put($path, $contents);

        self::assertFalse(function_exists('laravel_helpers_test_application_path'));
        self::assertSame(Command::FAILURE, $this->runCommand('helper:functions'));
        self::assertSame($contents, $this->files->get($path));

        $this->refreshApplication();
        self::assertSame($this->app->path(), laravel_helpers_test_application_path());

        $this->refreshApplication();
        self::assertSame($this->app->path(), laravel_helpers_test_application_path());
    }

    public function testGeneratedHelpersDispatchNativeMethodsAndPreserveReferences(): void
    {
        self::assertSame(Command::SUCCESS, $this->runCommand('helper:init'));
        $arr = $this->loadHelper('Arr');
        $date = $this->loadHelper('Date');
        $file = $this->loadHelper('File');
        $number = $this->loadHelper('Number');
        $str = $this->loadHelper('Str');

        $data = [];
        $arr::set($data, 'settings.mode', 'dark');
        self::assertSame(['settings' => ['mode' => 'dark']], $data);
        self::assertSame('dark', $arr::get($data, 'settings.mode'));
        self::assertSame('dark', $arr::pull($data, 'settings.mode'));
        self::assertSame(['settings' => []], $data);
        $arr::forget($data, 'settings');
        self::assertSame([], $data);

        if (method_exists(Arr::class, 'push')) {
            self::assertSame(['items' => ['book', 'pen']], $arr::push($data, 'items', 'book', 'pen'));
            self::assertSame(['items' => ['book', 'pen']], $data);
        }

        $day = $date::parse('2024-02-29 12:34:56', 'UTC');
        $date::setTestNow($day);
        self::assertSame('2024-02-29 12:34:56', $date::now('UTC')->toDateTimeString());

        $path = $this->app->path('note.txt');
        self::assertSame(5, $file::put($path, 'hello'));
        self::assertTrue($file::exists($path));
        self::assertSame('hello', $file::get($path));
        self::assertSame('1,234.50', $number::format(1234.5, 2, locale: 'en_US'));
        self::assertSame('laravel-helpers', $str::slug('Laravel Helpers'));

        foreach ([$arr, $file, $number, $str] as $helper) {
            $helper::macro('laravelHelpersTestMacro', fn ($value) => $value);

            try {
                self::assertSame('macro', $helper::laravelHelpersTestMacro('macro'));
            } finally {
                $helper::flushMacros();
            }
        }

        foreach ([$arr, $date, $file, $number, $str] as $helper) {
            try {
                $helper::laravelHelpersMissingMethod();
                self::fail("$helper did not reject an unknown method.");
            } catch (BadMethodCallException $exception) {
                self::assertStringContainsString('laravelHelpersMissingMethod', $exception->getMessage());
            }
        }
    }

    public function testGeneratedStrExposesAllCharacterChecks(): void
    {
        self::assertSame(Command::SUCCESS, $this->runCommand('helper:create', ['name' => 'Str']));
        $str = $this->loadHelper('Str');

        $cases = [
            'isAlphanumeric' => ['abc123', 'abc 123'],
            'isAlpha' => ['abc', 'abc1'],
            'isControl' => ["\n\r", "a\n"],
            'isDigit' => ['123', '-123'],
            'isGraph' => ['abc!23', 'abc 23'],
            'isLower' => ['abc', 'Abc'],
            'isPrint' => ['abc 23', "abc\n23"],
            'isPunct' => ['!@#', 'a!'],
            'isSpace' => [" \t", 'a '],
            'isUpper' => ['ABC', 'ABc'],
            'isHex' => ['1a2B', '1g2B'],
        ];

        foreach ($cases as $method => [$valid, $invalid]) {
            self::assertTrue($str::$method($valid), $method);
            self::assertFalse($str::$method($invalid), $method);
            self::assertFalse($str::$method(''), $method);
        }
    }

    private function runCommand(string $command, array $parameters = []): int
    {
        return $this->app->make(Kernel::class)->call($command, $parameters);
    }

    private function loadHelper(string $name): string
    {
        require_once $this->app->path("Helpers/$name.php");

        return $this->namespace.'\\Helpers\\'.$name;
    }

    private function writeJson(string $path, array $data): void
    {
        $this->files->put($this->fixture.'/'.$path, json_encode($data, JSON_THROW_ON_ERROR));
    }
}
