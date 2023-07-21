<?php

namespace Rmunate\LaravelHelpers\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CreateHelpers extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'create:helper {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new class that contains all the helpers of a single category.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Get the name of the helper class from the command argument
        $name = $this->argument('name');
        $className = Str::studly($name);
        $fileName = $className.'.php';

        // Ensure the Helpers directory exists
        $path = app_path('Helpers');
        File::ensureDirectoryExists($path);

        // Generate the content from a stub file
        $stub = $this->generateStub($className);

        // Set the file path
        $filePath = $path.'/'.$fileName;

        // Put the generated content into the file
        if (File::put($filePath, $stub)) {
            if (property_exists($this, 'components') && $this->components !== null) {
                $this->components->info("Helper class [$filePath] created successfully.");
            } else {
                $this->info("Helper class [$filePath] created successfully.");
            }
        } else {
            if (property_exists($this, 'components') && $this->components !== null) {
                $this->components->error("Failed to create helper class [$filePath]. The class already exists");
            } else {
                $this->error("Failed to create helper class [$filePath]. The class already exists");
            }
        }
    }

    /**
     * Generate the content from the stub file.
     *
     * @param string $className
     * @return string
     */
    private function generateStub($className)
    {
        // Read the content from the stub file
        $stubPath = __DIR__.'/../Stubs/CategoryHelpers.stub';
        $stubContent = File::get($stubPath);

        // Replace the placeholder with the actual class name
        $stubContent = str_replace('{{class}}', $className, $stubContent);

        return $stubContent;
    }
}
