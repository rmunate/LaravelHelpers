<?php

use Rmunate\LaravelHelpers\Exceptions\HelpersGeneralException;
use Rmunate\LaravelHelpers\Traits\HelperUtilities;

/**
 * The Helper class provides a dynamic method invocation mechanism for helper classes.
 */
class Helper
{
    use HelperUtilities;

    /**
     * Call a static method dynamically based on the method name.
     *
     * @param mixed $method
     * @param mixed $args
     *
     * @throws HelpersGeneralException if the method or category is undefined.
     *
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        // Parse the requested method
        $request = self::parseMethod($method);

        // Get the class of the specified category
        $class = self::category($request->category);

        //Validate Traits
        $uses = class_uses($class);
        if (count($uses) > 0) {
            foreach ($uses as $use) {
                if (method_exists($use, '__call')) {
                    $method = $request->method;

                    return $class->$method(...$args);
                } else {
                    if (method_exists($use, $request->method)) {
                        call_user_func_array([$class, $request->method], $args);
                        break;
                    }
                }
            }
        }

        // If the method does not exist, throw an exception
        if (!method_exists($class, $request->method)) {
            throw HelpersGeneralException::methodUndefined($request->method, $class);
        }

        // If the method exists, call it and return the result
        return call_user_func_array([$class, $request->method], $args);
    }

    /**
     * Read and instantiate helper classes from the Helpers directory.
     *
     * @return array
     */
    private static function readCategories()
    {
        // Get the list of helper class files
        $files = self::readClassesHelpers();

        // Create an array of category instances
        $categories = array_reduce($files, function ($carry, $file) {
            $className = self::parseClassName($file);
            $category = self::parseCategoryName($className);
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
     * @throws HelpersGeneralException if the category is undefined.
     *
     * @return mixed
     */
    private static function category(string $category)
    {
        // Convert the category name to uppercase
        $category_upper = strtoupper($category);

        // Retrieve the categories map
        $categoryMap = self::readCategories();

        // If the category exists, return the corresponding instance
        if (isset($categoryMap[$category_upper])) {
            return $categoryMap[$category_upper];
        }

        // If the category does not exist, throw an exception
        throw HelpersGeneralException::classUndefined($category);
    }
}
