<?php

namespace Helpers\Illuminate\Support\Commands;

use Helpers\Illuminate\Support\Commands\Traits\CommandUtilities;
use Illuminate\Console\Command;

class GenerateHelpers extends Command
{
    use CommandUtilities;

    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'helper:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate initial helper files in the App/Helpers directory';

    /**
     * Array of helper files to be generated.
     *
     * @var array
     */
    private $files = [
        'Arr.php',
        'Date.php',
        'File.php',
        'Number.php',
        'Str.php',
    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Ensure the Helpers directory exists
        $helpersPath = $this->ensureDirectoryExists('Helpers');

        // Generate helper files
        foreach ($this->files as $file) {
            $filePath = $this->filePath($helpersPath, $file);

            if (!$this->fileExist($filePath)) {
                // Get the class name from the file path
                $className = $this->getClassName($filePath);

                // Get the content from a stub file
                $stub = $this->getStub($className);
                if ($this->filePut($filePath, $stub)) {
                    $this->notifyInfo("Helper class [$filePath] created successfully.");
                } else {
                    $this->notifyError("Failed to create helper class [$filePath].");
                }
            } else {
                $this->notifyError("Failed to create helper class [$filePath]. The class already exists");
            }
        }
    }
}
