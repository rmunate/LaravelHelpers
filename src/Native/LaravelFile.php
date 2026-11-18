<?php

namespace Helpers\Illuminate\Support\Native;

use Illuminate\Support\Facades\File as FileFacade;

trait LaravelFile
{
    public static function __callStatic($method, $arguments)
    {
        return FileFacade::$method(...$arguments);
    }
}
