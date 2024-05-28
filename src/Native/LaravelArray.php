<?php

namespace Helpers\Illuminate\Support\Native;

use BadMethodCallException;
use Illuminate\Support\Arr as ArrSupport;

trait LaravelArray
{
    /**
     * Dynamically handle method calls to the Arr class.
     *
     * @param string $method    The method being called.
     * @param array  $arguments The arguments being passed to the method.
     *
     * @return mixed The result of the method call.
     *
     * @throws BadMethodCallException If the method does not exist.
     */
    public static function __callStatic($method, $arguments)
    {
        // Check if the method exists in the Illuminate\Support\Arr class.
        if (method_exists(ArrSupport::class, $method)) {
            // Call the method statically and return the result.
            return ArrSupport::$method(...$arguments);
        } else {
            // Throw an exception if the method does not exist.
            throw new BadMethodCallException("The method {$method} does not exist.");
        }
    }
}
