<?php

namespace Rmunate\LaravelHelpers\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateHelpers extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'generate:helpers';

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
        'Arrays.php',
        'DataTime.php',
        'File.php',
        'General.php',
        'Html.php',
        'Security.php',
        'Strings.php',
    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Ensure the Helpers directory exists
        $helpersPath = app_path('Helpers');
        File::ensureDirectoryExists($helpersPath);

        // Generate helper files
        foreach ($this->files as $file) {
            $filePath = $helpersPath . '/' . $file;
            if (!File::exists($filePath)) {
                $this->createFile($filePath);

                if (property_exists($this, 'components') && $this->components !== null) {
                    $this->components->info("Helper class [$filePath] created successfully.");
                } else {
                    $this->info("Helper class [$filePath] created successfully.");
                }
            } else {
                if (property_exists($this, 'components') && $this->components !== null) {
                    $this->components->error("Failed to create helper class [$filePath].");
                } else {
                    $this->error("Failed to create helper class [$filePath].");
                }
            }
        }
    }

    /**
     * Create a new helper file.
     *
     * @param string $filePath
     * @return void
     */
    private function createFile($filePath)
    {
        // Get the class name from the file path
        $className = $this->getClassName($filePath);

        // Get the content from a stub file
        $stubContent = $this->getStubContent();

        // Replace placeholders with actual data
        $content = str_replace('{{class}}', $className, $stubContent);

        File::put($filePath, $content);
    }

    /**
     * Get the class name from the file path.
     *
     * @param string $filePath
     * @return string
     */
    private function getClassName($filePath)
    {
        $className = pathinfo($filePath, PATHINFO_FILENAME);

        return $className;
    }

    /**
     * Get the content from the stub file.
     *
     * @return string
     */
    private function getStubContent()
    {
        // Read the content from the stub file
        $stubPath = __DIR__ . '/../Stubs/CategoryHelpers.stub';
        $stubContent = File::get($stubPath);

        return $stubContent;
    }
}
