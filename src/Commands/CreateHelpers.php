<?php

namespace Rmunate\LaravelHelpers\Commands;

use Illuminate\Console\Command;
use Rmunate\LaravelHelpers\Traits\CommandUtilities;

class CreateHelpers extends Command
{
    use CommandUtilities;

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

        //Validate Name Class
        if (!$this->validateName($name)) {
            $this->notifyError('The name that you want to assign to the Helpers category is invalid, it must contain only letters and start each word with a capital letter without spaces or accents.');

            return;
        }

        //Generate Name
        $className = $this->studly($name);
        $fileName = $this->fileName($className);

        // Ensure the Helpers directory exists
        $path = $this->ensureDirectoryExists('Helpers');

        // Generate the content from a stub file
        $stub = $this->getStub($className);

        // Set the file path
        $filePath = $this->filePath($path, $fileName);

        // Put the generated content into the file
        if (!$this->fileExist($filePath) && $this->filePut($filePath, $stub)) {
            $this->notifyInfo("Helper class [$filePath] created successfully.");
        } else {
            $this->notifyError("Failed to create helper class [$filePath]. The class already exists");
        }
    }
}
