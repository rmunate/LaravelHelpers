<?php

use Exception;

class Helper
{
    /**
     * Call a static method dynamically based on the method name.
     *
     * @param mixed $method
     * @param mixed $args
     *
     * @throws Exception
     *
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $parts = preg_split('/(?<=\p{Ll})(?=\p{Lu})/u', $method);
        $category = strtoupper(trim($parts[0]));
        $realMethod = lcfirst(implode('', array_slice($parts, 1)));

        $class = self::category($category);
        if (!method_exists($class, $realMethod)) {
            throw new Exception("The method '".$realMethod."' is not defined in the class '".get_class($class).".php'");
        }

        return call_user_func_array([$class, $realMethod], $args);
    }

    /**
     * Read and instantiate helper classes from the Helpers directory.
     *
     * @return array
     */
    private static function readCategories()
    {
        $directory = base_path().'/app/Helpers/';
        $files = glob($directory.'*.php');

        $categories = array_reduce($files, function ($carry, $file) {
            $className = 'App\\Helpers\\'.basename($file, '.php');
            $category = strtoupper(substr($className, strrpos($className, '\\') + 1));
            $carry[$category] = new $className();

            return $carry;
        }, []);

        return $categories;
    }

    /**
     * Get an instance of the specified category.
     *
     * @param string $category
     *
     * @throws Exception
     *
     * @return mixed
     */
    private static function category(string $category)
    {
        $category_upper = strtoupper($category);
        $categoryMap = self::readCategories();

        if (isset($categoryMap[$category_upper])) {
            return $categoryMap[$category_upper];
        }

        throw new Exception("There is no class 'App\\Helpers\\".ucwords(strtolower($category))."' under the 'namespace App\Helpers'");
    }
}
