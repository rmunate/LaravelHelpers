<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

class CreateHelper extends Command
{
    protected $signature = 'create:helper {name}';

    protected $description = 'Create a new helper class';

    public function handle()
    {
        $name = $this->argument('name');
        $className = Str::studly($name);
        $fileName = $className . '.php';

        $path = app_path('Helpers');
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        $stub = <<<PHP
        <?php

        use Rmunate\LaravelHelpers\BaseHelpers;

        namespace App\Helpers;

        class {$className} extends BaseHelpers
        {
            // public function nameHelper(){
            //     //.. Your code
            // }
        }

        PHP;

        file_put_contents($path . '/' . $fileName, $stub);

        $this->info('Helper class created successfully!');
    }
}
