<?php

namespace Helpers\Illuminate\Support\Commands\Traits;

use Illuminate\Support\Facades\File;

trait CommandUtilities
{
    private const NATIVE_CLASSES = [
        'arr'    => 'Arr',
        'date'   => 'Date',
        'file'   => 'File',
        'number' => 'Number',
        'str'    => 'Str',
    ];

    private function writeHelper(string $name, bool $skipExisting = false): bool
    {
        $directory = $this->laravel->path('Helpers');
        File::ensureDirectoryExists($directory);

        if (!File::isDirectory($directory)) {
            $this->error("Could not create the helpers directory [$directory].");

            return false;
        }

        $path = $directory.DIRECTORY_SEPARATOR.$name.'.php';

        if (File::exists($path) || is_link($path)) {
            if ($skipExisting && File::isFile($path)) {
                $this->info("Skipped existing helper file [$path].");

                return true;
            }

            $this->error("Cannot create helper file [$path]: the path already exists.");

            return false;
        }

        $contents = $this->renderHelper($name);
        $handle = @fopen($path, 'xb');

        if ($handle === false) {
            $this->error("Cannot create helper file [$path]. Check permissions and confirm the path is available.");

            return false;
        }

        $bytes = @fwrite($handle, $contents);
        $closed = @fclose($handle);

        if ($bytes !== strlen($contents) || !$closed) {
            File::delete($path);
            $this->error("Could not write the complete helper file [$path].");

            return false;
        }

        $this->info("Helper file [$path] created successfully.");

        return true;
    }

    private function renderHelper(string $name): string
    {
        $stub = $name === 'Functions' || isset(self::NATIVE_CLASSES[strtolower($name)]) ? $name : 'Custom';
        $contents = File::get(dirname(__DIR__, 2).'/Stubs/'.$stub.'.stub');

        return $name === 'Functions' ? $contents : strtr($contents, [
            '{{namespace}}' => $this->laravel->getNamespace().'Helpers',
            '{{class}}'     => $name,
        ]);
    }
}
