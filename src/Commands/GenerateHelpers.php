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

class CreateHelperCommand extends Command
{
    protected $signature = 'helper:create';

    protected $description = 'Create helper classes';

    private $files = [
        'Arrays.php',
        'DataTime.php',
        'File.php',
        'General.php',
        'Html.php',
        'Security.php',
        'Strings.php',
    ];

    public function handle()
    {
        $helpersPath = app_path('Helpers');
        File::ensureDirectoryExists($helpersPath);

        foreach ($this->files as $file) {
            $filePath = $helpersPath . '/' . $file;
            if (!File::exists($filePath)) {
                $this->createFile($filePath);
                $this->info("Helper class [$filePath] created successfully.");
            } else {
                $this->error("Failed to create helper class [$filePath].");
            }
        }
    }

    private function createFile($filePath)
    {
        $className = $this->getClassName($filePath);

        $content = <<<PHP
        <?php

        namespace App\Helpers;

        use Rmunate\LaravelHelpers\BaseHelpers;

        class {$className} extends BaseHelpers
        {
            /**
             * This is the structure that you must follow each time you create a new helper.
             *
             * /**
             *  * Perform a specific task.
             *  *
             *  * @return void
             *  */
            public function helperName()
            {
                //.. The helper code
            }
        }

        PHP;

        File::put($filePath, $content);
    }

    private function getClassName($filePath)
    {
        $className = pathinfo($filePath, PATHINFO_FILENAME);
        $namespace = 'App\Helpers\\';
        $namespace = str_replace('/', '\\', dirname($filePath)) . '\\';

        return $className;
    }
}
