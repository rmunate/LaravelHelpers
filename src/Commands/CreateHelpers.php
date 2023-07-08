<?php

namespace Rmunate\LaravelHelpers\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CreateHelpers extends Command
{
    protected $signature = 'create:helper {name}';

    protected $description = 'Create a new class that contains all the helpers of a single category.';

    public function handle()
    {
        $name = $this->argument('name');
        $className = Str::studly($name);
        $fileName = $className.'.php';

        $path = app_path('Helpers');
        File::ensureDirectoryExists($path);

        $stub = $this->generateStub($className);

        $filePath = $path.'/'.$fileName;

        if (File::put($filePath, $stub)) {
            $this->info("Helper class [$filePath] created successfully.");
        } else {
            $this->error("Failed to create helper class [$filePath].");
        }
    }

    private function generateStub($className)
    {
        return <<<PHP
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
    }
}
