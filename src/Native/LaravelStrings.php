<?php

namespace Helpers\Illuminate\Support\Native;

use Illuminate\Support\Str as StrSupport;

trait LaravelStrings
{
    public static function isAlphanumeric(string $string): bool
    {
        return ctype_alnum($string);
    }

    public static function isAlpha(string $string): bool
    {
        return ctype_alpha($string);
    }

    public static function isControl(string $string): bool
    {
        return ctype_cntrl($string);
    }

    public static function isDigit(string $string): bool
    {
        return ctype_digit($string);
    }

    public static function isGraph(string $string): bool
    {
        return ctype_graph($string);
    }

    public static function isLower(string $string): bool
    {
        return ctype_lower($string);
    }

    public static function isPrint(string $string): bool
    {
        return ctype_print($string);
    }

    public static function isPunct(string $string): bool
    {
        return ctype_punct($string);
    }

    public static function isSpace(string $string): bool
    {
        return ctype_space($string);
    }

    public static function isUpper(string $string): bool
    {
        return ctype_upper($string);
    }

    public static function isHex(string $string): bool
    {
        return ctype_xdigit($string);
    }

    public static function __callStatic($method, $arguments)
    {
        return StrSupport::$method(...$arguments);
    }
}
