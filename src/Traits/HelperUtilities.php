<?php

namespace Rmunate\LaravelHelpers\Traits;

/**
 * The HelperUtilities trait provides utility methods used in the Helper class.
 */
trait HelperUtilities
{
    /**
     * Parse the method name into category and real method parts.
     *
     * @param string $method The name of the method to parse.
     *
     * @return object An object with 'category' and 'method' properties.
     */
    public static function parseMethod($method)
    {
        // Split the method name into category and real method parts
        $parts = preg_split('/(?<=\p{Ll})(?=\p{Lu})/u', $method);

        // Extract category and real method
        return (object) [
            'category' => strtoupper(trim($parts[0])),
            'method'   => lcfirst(implode('', array_slice($parts, 1))),
        ];
    }

    /**
     * Parse the file name to construct the full class name.
     *
     * @param string $file The name of the file to parse.
     *
     * @return string The full class name with namespace.
     */
    public static function parseClassName($file)
    {
        return 'App\\Helpers\\'.basename($file, '.php');
    }

    /**
     * Parse the class name to extract the category name.
     *
     * @param string $className The full class name with namespace.
     *
     * @return string The uppercase category name.
     */
    public static function parseCategoryName($className)
    {
        return strtoupper(substr($className, strrpos($className, '\\') + 1));
    }

    /**
     * Read helper class files from the Helpers directory.
     *
     * @return array An array of file names.
     */
    public static function readClassesHelpers()
    {
        $directory = base_path().'/app/Helpers/';

        return glob($directory.'*.php');
    }
}
