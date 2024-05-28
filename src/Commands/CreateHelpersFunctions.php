<?php

namespace Helpers\Illuminate\Support\Commands;

use Helpers\Illuminate\Support\Commands\Traits\CommandUtilities;
use Illuminate\Console\Command;

class CreateHelpersFunctions extends Command
{
    use CommandUtilities;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'helper:functions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a global functions file in the Helpers directory.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Ensure the Helpers directory exists
        $path = $this->ensureDirectoryExists('Helpers');

        // Generate the content from a stub file
        $stub = $this->getStubFunction();
        $fileName = 'Functions.php';

        // Set the file path
        $filePath = $this->filePath($path, $fileName);

        // Put the generated content into the file
        if (!$this->fileExist($filePath) && $this->filePut($filePath, $stub)) {
            $this->notifyInfo("Helper file [$filePath] created successfully.");
        } else {
            $this->notifyError("Failed to create helper file [$filePath]. The file already exists.");
        }
    }
}
