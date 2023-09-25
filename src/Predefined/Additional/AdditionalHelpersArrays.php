<?php

namespace Rmunate\LaravelHelpers\Predefined\Additional;

use Rmunate\LaravelHelpers\Predefined\Arrayable\Arrayable;

trait AdditionalHelpersArrays
{
    /**
     * Get a new Arrayable object from the given array or string.
     *
     * @param string|array $values
     *
     * @return \Rmunate\LaravelHelpers\Predefined\Arrayable\Arrayable
     */
    public static function of(string|array $values)
    {
        return new Arrayable($values);
    }
}
