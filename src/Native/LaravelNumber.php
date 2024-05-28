<?php

namespace Helpers\Illuminate\Support\Native;

use BadMethodCallException;
use Illuminate\Support\Number as NumberSupport;

trait LaravelNumber
{
    /**
     * Dynamically handle method calls to the Number class.
     *
     * @param string $method    The method being called.
     * @param array  $arguments The arguments being passed to the method.
     *
     * @throws BadMethodCallException If the method does not exist.
     *
     * @return mixed The result of the method call.
     */
    public static function __callStatic($method, $arguments)
    {
        // Check if the method exists in the Number class.
        if (method_exists(NumberSupport::class, $method)) {
            // Call the method statically and return the result.
            return NumberSupport::$method(...$arguments);
        } else {
            // Throw an exception if the method does not exist.
            throw new BadMethodCallException("The method {$method} does not exist.");
        }
    }
}
