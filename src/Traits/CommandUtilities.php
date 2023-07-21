<?php

namespace Rmunate\LaravelHelpers\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait CommandUtilities
{
    /**
     * Validate the name to contain only letters.
     *
     * @param string $name
     *
     * @return bool
     */
    private function validateName($name)
    {
        return preg_match('/^[A-Za-z]+$/u', $name);
    }

    /**
     * Check if the 'components' property exists and is not null.
     *
     * @return bool
     */
    private function validateComponents()
    {
        return property_exists($this, 'components') && $this->components !== null;
    }

    /**
     * Display an error message using the 'components' property if available, otherwise use the default 'error' method.
     *
     * @param string $message
     *
     * @return void
     */
    private function notifyError($message)
    {
        if ($this->validateComponents()) {
            $this->components->error($message);
        } else {
            $this->error($message);
        }
    }

    /**
     * Display an info message using the 'components' property if available, otherwise use the default 'info' method.
     *
     * @param string $message
     *
     * @return void
     */
    private function notifyInfo($message)
    {
        if ($this->validateComponents()) {
            $this->components->info($message);
        } else {
            $this->info($message);
        }
    }

    /**
     * Convert a string to studly case.
     *
     * @param string $name
     *
     * @return string
     */
    private function studly($name)
    {
        return Str::studly($name);
    }

    /**
     * Generate the file name by adding '.php' extension to the given name.
     *
     * @param string $name
     *
     * @return string
     */
    private function fileName($name)
    {
        return $name.'.php';
    }

    /**
     * Ensure the existence of the 'Helpers' directory and return its path.
     *
     * @return string
     */
    private function ensureDirectoryExists($directory)
    {
        $path = app_path($directory);
        File::ensureDirectoryExists($path);

        return $path;
    }

    /**
     * Get the full file path by combining the directory path and the file name.
     *
     * @param string $path
     * @param string $fileName
     *
     * @return string
     */
    private function filePath($path, $fileName)
    {
        return $path.'/'.$fileName;
    }

    /**
     * Check if the file exists.
     *
     * @param string $filePath
     *
     * @return bool
     */
    private function fileExist($filePath)
    {
        return File::exists($filePath);
    }

    /**
     * Put the generated content into the file.
     *
     * @param string $filePath
     * @param string $stub
     *
     * @return bool
     */
    private function filePut($filePath, $stub)
    {
        return File::put($filePath, $stub);
    }

    /**
     * Get the content of a file.
     *
     * @param string $path
     *
     * @return string
     */
    private function fileGet($path)
    {
        return File::get($path);
    }

    /**
     * Replace a search string with a replace string in the target string.
     *
     * @param string $search
     * @param string $replace
     * @param string $target
     *
     * @return string
     */
    private function replaceString($search, $replace, $target)
    {
        return str_replace($search, $replace, $target);
    }

    /**
     * Generate the content from the stub file.
     *
     * @param string $className
     *
     * @return string
     */
    private function getStub($className)
    {
        // Replace the placeholder with the actual class name
        return $this->replaceString('{{class}}', $className, $this->fileGet(__DIR__.'/../Stubs/CategoryHelpers.stub'));
    }

    /**
     * Get the class name from the file path.
     *
     * @param string $filePath
     *
     * @return string
     */
    private function getClassName($filePath)
    {
        return pathinfo($filePath, PATHINFO_FILENAME);
    }
}
