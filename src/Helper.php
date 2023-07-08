<?php

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
