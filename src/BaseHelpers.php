<?php

namespace Rmunate\LaravelHelpers;

use BadMethodCallException;

abstract class BaseHelpers
{
    /**
     * Handle calls to missing methods on the helper.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @throws BadMethodCallException
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        throw new BadMethodCallException(sprintf(
            'Method %s::%s does not exist.',
            static::class,
            $method
        ));
    }

    /**
     * Get a new instance of the class.
     *
     * @return static
     */
    public static function instance()
    {
        return new static();
    }

    /**
     * Get a new instance of the class.
     *
     * @return static
     */
    public static function helpers()
    {
        return new static();
    }
}
