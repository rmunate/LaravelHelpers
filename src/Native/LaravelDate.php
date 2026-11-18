<?php

namespace Helpers\Illuminate\Support\Native;

use Illuminate\Support\Facades\Date as DateFacade;

trait LaravelDate
{
    public static function __callStatic($method, $arguments)
    {
        return DateFacade::$method(...$arguments);
    }
}
