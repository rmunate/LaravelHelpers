<?php

namespace Helpers\Illuminate\Support\Native;

use ArrayAccess;
use Illuminate\Support\Arr as ArrSupport;

trait LaravelArray
{
    // Magic dispatch cannot preserve arguments passed by reference.
    public static function set(&$array, $key, $value)
    {
        return ArrSupport::set($array, $key, $value);
    }

    public static function forget(&$array, $keys): void
    {
        ArrSupport::forget($array, $keys);
    }

    public static function pull(&$array, $key, $default = null)
    {
        return ArrSupport::pull($array, $key, $default);
    }

    public static function push(ArrayAccess|array &$array, string|int|null $key, mixed ...$values): ArrayAccess|array
    {
        return ArrSupport::push($array, $key, ...$values);
    }

    public static function __callStatic($method, $arguments)
    {
        return ArrSupport::$method(...$arguments);
    }
}
