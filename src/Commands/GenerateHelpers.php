<?php

namespace Rmunate\LaravelHelpers\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateHelpers extends Command
{
    protected $signature = 'generate:helpers';

    protected $description = 'Generate initial helper files in the App/Helpers directory';

    private $files = [
        'Arrays.php',
        'DataTime.php',
        'File.php',
        'General.php',
        'Html.php',
        'Security.php',
        'Strings.php',
    ];

    public function handle()
    {
        $helpersPath = app_path('Helpers');
        File::ensureDirectoryExists($helpersPath);

        foreach ($this->files as $file) {
            $filePath = $helpersPath.'/'.$file;
            if (!File::exists($filePath)) {
                $this->createFile($filePath);
                $this->info("Helper class [$filePath] created successfully.");
            } else {
                $this->error("Failed to create helper class [$filePath].");
            }
        }
    }

    private function createFile($filePath)
    {
        $className = $this->getClassName($filePath);

        $content = <<<PHP
        <?php

        namespace App\Helpers;

        use Rmunate\LaravelHelpers\BaseHelpers;

        class {$className} extends BaseHelpers
        {
            /**
             * This is the standard structure to follow when creating a new helper.
             * 
             * @return void
             */
            public function helperName()
            {
                //.. The helper code
            }
        }
        PHP;

        File::put($filePath, $content);
    }

    private function getClassName($filePath)
    {
        $className = pathinfo($filePath, PATHINFO_FILENAME);
        $namespace = 'App\Helpers\\';
        $namespace = str_replace('/', '\\', dirname($filePath)).'\\';

        return $className;
    }
}
