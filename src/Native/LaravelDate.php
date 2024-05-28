<?php

namespace Helpers\Illuminate\Support\Native;

use BadMethodCallException;
use Illuminate\Support\Facades\Date as DateFacade;

trait LaravelDate
{
    /**
     * Dynamically handle method calls to the Date facade.
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
        // Check if the method exists in the Date facade.
        if (method_exists(DateFacade::class, $method)) {
            // Call the method statically and return the result.
            return DateFacade::$method(...$arguments);
        } else {
            // Throw an exception if the method does not exist.
            throw new BadMethodCallException("The method {$method} does not exist.");
        }
    }
}
