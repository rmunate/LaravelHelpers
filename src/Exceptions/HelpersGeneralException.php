<?php

namespace Rmunate\LaravelHelpers\Exceptions;

use Exception;

/**
 * The HelpersGeneralException class represents a general exception for helper-related errors.
 */
class HelpersGeneralException extends Exception
{
    /**
     * Create a new helper method not found exception.
     *
     * @param string $method The name of the undefined method.
     * @param mixed  $class  The class where the method is undefined.
     *
     * @return static
     */
    public static function methodUndefined($method, $class)
    {
        $message = "The method '{$method}' is not defined in the class '".get_class($class).".php'";

        return new static($message);
    }

    /**
     * Create a new exception for an undefined helper class.
     *
     * @param string $category The name of the undefined helper category.
     *
     * @return static
     */
    public static function classUndefined($category)
    {
        $message = "There is no class 'App\\Helpers\\".ucwords(strtolower($category))."' under the 'namespace App\Helpers'";

        return new static($message);
    }
}
