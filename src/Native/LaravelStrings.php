<?php

namespace Helpers\Illuminate\Support\Native;

use BadMethodCallException;
use Illuminate\Support\Str as StrSupport;

trait LaravelStrings
{
    /**
     * Dynamically handle method calls to the Str class.
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
        // Check if the method exists in the Str class.
        if (method_exists(StrSupport::class, $method)) {
            // Call the method statically and return the result.
            return StrSupport::$method(...$arguments);
        } else {
            // Throw an exception if the method does not exist.
            throw new BadMethodCallException("The method {$method} does not exist.");
        }
    }
}
