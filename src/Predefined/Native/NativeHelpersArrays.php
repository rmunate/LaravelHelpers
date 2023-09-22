<?php

namespace Rmunate\LaravelHelpers\Predefined\Native;

use Rmunate\LaravelHelpers\Exceptions\HelpersGeneralException;

/**
 * These are the native methods included in the framework.
 */
trait NativeHelpersArrays
{
    /**
     * Handle dynamic method calls on the class.
     *
     * @param  string  $method      The method being called.
     * @param  array   $arguments   The arguments passed to the method.
     * @return mixed
     *
     * @throws \HelpersGeneralException
     */
    public function __call($method, $arguments)
    {
        // Define the class names for the native and custom Arr classes.
        $classNameNative = 'Illuminate\\Support\\Arr';
        $classNameHelpers = 'App\\Helpers\\Arrays';

        // Check if the method exists in the native Arr class.
        if (method_exists($classNameNative, $method)) {

            // Call the method on the native Arr class and return the result.
            return call_user_func_array([$classNameNative, $method], $arguments);

        } else {

            // The method does not exist in the native Arr class, so throw an exception.
            throw HelpersGeneralException::methodUndefined($method, $classNameNative, $classNameHelpers);
            
        }
    }

}
