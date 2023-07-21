<?php

namespace Rmunate\LaravelHelpers\Exceptions;

use BadMethodCallException;

class HelpersCallException extends BadMethodCallException
{
    /**
     * Create a new custom method call exception.
     *
     * @param string $method
     * @param string $class
     *
     * @return static
     */
    public static function create($method, $class)
    {
        $message = sprintf('Method %s::%s does not exist.', $class, $method);

        return new static($message);
    }
}
