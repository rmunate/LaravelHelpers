<?php

namespace Helpers\Illuminate\Support\Native;

use Illuminate\Support\Number as NumberSupport;

trait LaravelNumber
{
    public static function __callStatic($method, $arguments)
    {
        return NumberSupport::$method(...$arguments);
    }
}
