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

class Helper
{
    /**
     * @param mixed $method
     * @param mixed $args
     *
     * @return Call Method
     */
    public static function __callStatic($method, $args)
    {
        $parts = preg_split('/(?<=\p{Ll})(?=\p{Lu})/u', $method);
        $category = strtoupper(trim($parts[0]));
        $realMethod = lcfirst(implode('', array_slice($parts, 1)));

        $class = self::category($category);
        if (!method_exists($class, $realMethod)) {
            throw new \Exception("The method '".$realMethod."' is not defined in the class '".get_class($class).".php'");
        }

        // $instance = new $class();
        return call_user_func_array([$class, $realMethod], $args);
    }

    /**
     * @return New Instance Category Helper
     */
    private static function readCategories()
    {
        /* Directory where the classes are located. */
        $directory = base_path().'/app/Helpers/';

        /* Get all the PHP files in the directory. */
        $files = glob($directory.'*.php');

        /* Create Dynamic Array of Dependencies. */
        $categories = array_reduce($files, function ($carry, $file) {
            $className = 'App\\Helpers\\'.basename($file, '.php');
            $category = strtoupper(substr($className, strrpos($className, '\\') + 1));
            $carry[$category] = new $className();

            return $carry;
        }, []);

        return $categories;
    }

    /**
     * @param string $category
     *
     * @return new Instance
     */
    private static function category(string $category)
    {
        /* Ensure Uppercase */
        $category_upper = strtoupper($category);

        /* Query Loaded Classes */
        $categoryMap = self::readCategories();

        /* Only if the class exists return the instance */
        if (isset($categoryMap[$category_upper])) {
            return $categoryMap[$category_upper];
        }

        throw new \Exception("There is no class 'App\\Helpers\\".ucwords(strtolower($category))."' under the 'namespace App\Helpers'");
    }
}
