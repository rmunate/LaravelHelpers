<?php

namespace Rmunate\LaravelHelpers\Bases;

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
     * Get a new instance of the class. DEPRECATED.
     * This scenario is only to support the v1.X version.
     *
     * @return static
     */
    public static function instance()
    {
        return new static();
    }

    /**
     * Get a new instance of the class.
     * (Helper) and (Helpers) are created since it has been a constant confusion among library users.
     *
     * @return static
     */
    public static function helpers()
    {
        return new static();
    }

    /**
     * Get a new instance of the class.
     * (Helper) and (Helpers) are created since it has been a constant confusion among library users.
     *
     * @return static
     */
    public static function helper()
    {
        return new static();
    }
}
