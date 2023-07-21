<?php

namespace Rmunate\LaravelHelpers;

use Rmunate\LaravelHelpers\Exceptions\HelpersCallException;

abstract class BaseHelpers
{
    /**
     * Handle calls to missing methods on the helper.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @throws HelpersCallException
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        throw HelpersCallException::create($method, static::class);
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