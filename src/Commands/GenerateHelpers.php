<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateHelpers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'structure:helpers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate initial helper files in the App/Helpers directory';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $helpersPath = app_path('Helpers');

        if (!File::exists($helpersPath)) {
            File::makeDirectory($helpersPath);
            $this->info('Helpers directory created successfully!');
        } else {
            $this->info('Helpers directory already exists!');
        }

        $files = [
            'Arrays.php',
            'DataTime.php',
            'File.php',
            'General.php',
            'Html.php',
            'Security.php',
            'Strings.php',
        ];

        foreach ($files as $file) {
            $filePath = $helpersPath . '/' . $file;
            if (!File::exists($filePath)) {
                $this->createFile($filePath);
                $this->info($file . ' created successfully!');
            } else {
                $this->info($file . ' already exists!');
            }
        }
    }

    /**
     * Create a new PHP file with the specified namespace and class structure.
     *
     * @param string $filePath
     * @return void
     */
    private function createFile($filePath)
    {
        $namespace = 'App\Helpers';
        $className = $this->getClassName($filePath);

        $content = <<<PHP
        <?php

        use Rmunate\LaravelHelpers\BaseHelpers;

        namespace {$namespace};

        class {$className} extends BaseHelpers
        {
            // public function nameHelper(){
            //     //.. Your code
            // }
        }

        PHP;

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
        $namespace = 'App\Helpers\\';
        $namespace = str_replace('/', '\\', dirname($filePath)) . '\\';

        return $namespace . $className;
    }
}
?>