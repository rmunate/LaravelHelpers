<?php

/*
 * Copyright (c) [2023] [RAUL MAURICIO UÑATE CASTRO]
 * 
 * Esta biblioteca es un software de código abierto disponible bajo la licencia MIT.
 * Se concede permiso, de forma gratuita, a cualquier persona que obtenga una copia de esta biblioteca y los archivos de
 * documentación asociados (el "Software"), para utilizar la biblioteca sin restricciones, incluyendo, entre otras, las
 * siguientes acciones:
 *
 * - Utilizar la biblioteca con fines comerciales o no comerciales.
 * - Modificar la biblioteca y adaptarla a sus propias necesidades.
 * - Distribuir copias de la biblioteca.
 * - Sublicenciar la biblioteca.
 *
 * Al utilizar o distribuir esta biblioteca, se requiere que se incluya la siguiente atribución en todas las copias o
 * partes sustanciales de la misma:
 *
 * "[RAUL MAURICIO UÑATE CASTRO], titular de los derechos de autor de esta biblioteca, debe ser
 * reconocido y mencionado en todas las copias o derivados de la biblioteca."
 *
 * Además, si se realizan modificaciones en la biblioteca, se solicita que se incluya una nota adicional en la
 * documentación o en cualquier otro medio de notificación de los cambios realizados, que indique:
 *
 * "Esta biblioteca se ha modificado a partir de la biblioteca original desarrollada por [RAUL MAURICIO UÑATE CASTRO]."
 *
 * LA BIBLIOTECA SE PROPORCIONA "TAL CUAL", SIN GARANTÍA DE NINGÚN TIPO, EXPRESA O IMPLÍCITA, INCLUYENDO PERO NO
 * LIMITADO A GARANTÍAS DE COMERCIALIZACIÓN, ADECUACIÓN PARA UN PROPÓSITO PARTICULAR Y NO INFRACCIÓN. EN NINGÚN CASO
 * LOS AUTORES O TITULARES DE LOS DERECHOS DE AUTOR SERÁN RESPONSABLES DE NINGUNA RECLAMACIÓN, DAÑO O OTRA
 * RESPONSABILIDAD, YA SEA EN UNA ACCIÓN DE CONTRATO, AGRAVIO O CUALQUIER OTRO MOTIVO, QUE SURJA DE, O EN RELACIÓN CON
 * LA BIBLIOTECA O EL USO U OTROS TRATOS EN LA BIBLIOTECA.
 */

namespace Rmunate\LaravelHelpers\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateHelpers extends Command
{
    /*
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'generate:helpers';

    /**
     * The console command description.
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

        if (class_exists('Illuminate\Support\BaseHelpers')) {
            $originExtends = "Illuminate\Support\BaseHelpers";
        } else {
            $originExtends = "Rmunate\LaravelHelpers\BaseHelpers";
        }

        foreach ($files as $file) {
            $filePath = $helpersPath . '/' . $file;
            if (!File::exists($filePath)) {
                $this->createFile($filePath, $originExtends);
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
        $className = $this->getClassName($filePath, $originExtends);

        $content = <<<PHP
        <?php

        namespace {$namespace};

        use {$originExtends};

        class {$className} extends BaseHelpers
        {
            // This is the structure that you must follow each time you create a new helper.
            // public function helperName(){
            //     //.. The helper code
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

        return $className;
    }
}
?>