<?php

namespace Rmunate\LaravelHelpers\Predefined\Native;

use Illuminate\Support\Arr;
use Rmunate\LaravelHelpers\Exceptions\HelpersGeneralException;

/**
 * These are the native methods included in the framework.
 */
trait NativeHelpersArrays
{
    /**
     * Determine whether the given value is array accessible.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function accessible($value)
    {
        try {
            return Arr::accessible($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('accessible', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Add an element to an array using "dot" notation if it doesn't exist.
     *
     * @param array            $array
     * @param string|int|float $key
     * @param mixed            $value
     *
     * @return array
     */
    public function add(array $array, $key, $value)
    {
        try {
            return Arr::add($array, $key, $value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('add', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Collapse an array of arrays into a single array.
     *
     * @param iterable $array
     *
     * @return array
     */
    public function collapse($array)
    {
        try {
            return Arr::collapse($array);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('collapse', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Cross join the given arrays, returning all possible permutations.
     *
     * @param iterable ...$arrays
     *
     * @return array
     */
    public function crossJoin(...$arrays)
    {
        try {
            return Arr::crossJoin(...$arrays);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('crossJoin', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Divide an array into two arrays. One with keys and the other with values.
     *
     * @param array $array
     *
     * @return array
     */
    public function divide(array $array)
    {
        try {
            return Arr::divide($array);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('divide', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Flatten a multi-dimensional associative array with dots.
     *
     * @param iterable $array
     * @param string   $prepend
     *
     * @return array
     */
    public function dot($array, string $prepend = '')
    {
        try {
            return Arr::dot($array, $prepend);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('dot', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Convert a flatten "dot" notation array into an expanded array.
     *
     * @param iterable $array
     *
     * @return array
     */
    public function undot($array)
    {
        try {
            return Arr::undot($array);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('undot', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Get all of the given array except for a specified array of keys.
     *
     * @param array                  $array
     * @param array|string|int|float $keys
     *
     * @return array
     */
    public function except(array $array, $keys)
    {
        try {
            return Arr::except($array, $keys);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('except', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Determine if the given key exists in the provided array.
     *
     * @param \ArrayAccess|array $array
     * @param string|int         $key
     *
     * @return bool
     */
    public function exists($array, $key)
    {
        try {
            return Arr::exists($array, $key);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('exists', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Return the first element in an array passing a given truth test.
     *
     * @param iterable      $array
     * @param callable|null $callback
     * @param mixed         $default
     *
     * @return mixed
     */
    public function first($array, callable $callback = null, $default = null)
    {
        try {
            return Arr::first($array, $callback, $default);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('first', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Return the last element in an array passing a given truth test.
     *
     * @param array         $array
     * @param callable|null $callback
     * @param mixed         $default
     *
     * @return mixed
     */
    public function last(array $array, callable $callback = null, $default = null)
    {
        try {
            return Arr::last($array, $callback, $default);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('last', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Flatten a multi-dimensional array into a single level.
     *
     * @param iterable $array
     * @param int      $depth
     *
     * @return array
     */
    public function flatten($array, int $depth = INF)
    {
        try {
            return Arr::flatten($array, $depth);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('flatten', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Remove one or many array items from a given array using "dot" notation.
     *
     * @param array                  $array
     * @param array|string|int|float $keys
     *
     * @return void
     */
    public function forget(&$array, $keys)
    {
        try {
            Arr::forget($array, $keys);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('forget', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Get an item from an array using "dot" notation.
     *
     * @param \ArrayAccess|array $array
     * @param string|int|null    $key
     * @param mixed              $default
     *
     * @return mixed
     */
    public function get($array, $key, $default = null)
    {
        try {
            return Arr::get($array, $key, $default);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('get', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Check if an item or items exist in an array using "dot" notation.
     *
     * @param \ArrayAccess|array $array
     * @param string|array       $keys
     *
     * @return bool
     */
    public function has($array, $keys)
    {
        try {
            return Arr::has($array, $keys);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('has', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Determine if any of the keys exist in an array using "dot" notation.
     *
     * @param \ArrayAccess|array $array
     * @param string|array       $keys
     *
     * @return bool
     */
    public function hasAny($array, $keys)
    {
        try {
            return Arr::hasAny($array, $keys);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('hasAny', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Determines if an array is associative.
     *
     * An array is "associative" if it doesn't have sequential numerical keys beginning with zero.
     *
     * @param array $array
     *
     * @return bool
     */
    public function isAssoc(array $array)
    {
        try {
            return Arr::isAssoc($array);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('isAssoc', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Determines if an array is a list.
     *
     * An array is a "list" if all array keys are sequential integers starting from 0 with no gaps in between.
     *
     * @param array $array
     *
     * @return bool
     */
    public function isList(array $array)
    {
        try {
            return Arr::isList($array);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('isList', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Join all items using a string. The final items can use a separate glue string.
     *
     * @param array  $array
     * @param string $glue
     * @param string $finalGlue
     *
     * @return string
     */
    public function join(array $array, string $glue, string $finalGlue = '')
    {
        try {
            return Arr::join($array, $glue, $finalGlue);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('join', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Key an associative array by a field or using a callback.
     *
     * @param array                 $array
     * @param callable|array|string $keyBy
     *
     * @return array
     */
    public function keyBy(array $array, $keyBy)
    {
        try {
            return Arr::keyBy($array, $keyBy);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('keyBy', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Prepend the key names of an associative array.
     *
     * @param array  $array
     * @param string $prependWith
     *
     * @return array
     */
    public function prependKeysWith(array $array, string $prependWith)
    {
        try {
            return Arr::prependKeysWith($array, $prependWith);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('prependKeysWith', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Get a subset of the items from the given array.
     *
     * @param array        $array
     * @param array|string $keys
     *
     * @return array
     */
    public function only(array $array, $keys)
    {
        try {
            return Arr::only($array, $keys);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('only', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Pluck an array of values from an array.
     *
     * @param iterable              $array
     * @param string|array|int|null $value
     * @param string|array|null     $key
     *
     * @return array
     */
    public function pluck($array, $value, $key = null)
    {
        try {
            return Arr::pluck($array, $value, $key);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('pluck', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Explode the "value" and "key" arguments passed to "pluck".
     *
     * @param string|array      $value
     * @param string|array|null $key
     *
     * @return array
     */
    public function explodePluckParameters($value, $key)
    {
        try {
            return Arr::explodePluckParameters($value, $key);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('explodePluckParameters', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Run a map over each of the items in the array.
     *
     * @param array    $array
     * @param callable $callback
     *
     * @return array
     */
    public function map(array $array, callable $callback)
    {
        try {
            return Arr::map($array, $callback);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('map', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Run an associative map over each of the items.
     *
     * The callback should return an associative array with a single key/value pair.
     *
     * @template TKey
     * @template TValue
     * @template TMapWithKeysKey of array-key
     * @template TMapWithKeysValue
     *
     * @param array<TKey, TValue>                                               $array
     * @param callable(TValue, TKey): array<TMapWithKeysKey, TMapWithKeysValue> $callback
     *
     * @return array
     */
    public function mapWithKeys(array $array, callable $callback)
    {
        try {
            return Arr::mapWithKeys($array, $callback);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('mapWithKeys', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Push an item onto the beginning of an array.
     *
     * @param array $array
     * @param mixed $value
     * @param mixed $key
     *
     * @return array
     */
    public function prepend(array $array, $value, $key = null)
    {
        try {
            return Arr::prepend($array, $value, $key);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('prepend', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Get a value from the array, and remove it.
     *
     * @param array      $array
     * @param string|int $key
     * @param mixed      $default
     *
     * @return mixed
     */
    public function pull(&$array, $key, $default = null)
    {
        try {
            return Arr::pull($array, $key, $default);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('pull', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Convert the array into a query string.
     *
     * @param array $array
     *
     * @return string
     */
    public function query(array $array)
    {
        try {
            return Arr::query($array);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('query', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Get one or a specified number of random values from an array.
     *
     * @param array    $array
     * @param int|null $number
     * @param bool     $preserveKeys
     *
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function random(array $array, $number = null, $preserveKeys = false)
    {
        try {
            return Arr::random($array, $number, $preserveKeys);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('random', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Set an array item to a given value using "dot" notation.
     *
     * If no key is given to the method, the entire array will be replaced.
     *
     * @param array           $array
     * @param string|int|null $key
     * @param mixed           $value
     *
     * @return array
     */
    public function set(&$array, $key, $value)
    {
        try {
            return Arr::set($array, $key, $value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('set', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Shuffle the given array and return the result.
     *
     * @param array    $array
     * @param int|null $seed
     *
     * @return array
     */
    public function shuffle(array $array, $seed = null)
    {
        try {
            return Arr::shuffle($array, $seed);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('shuffle', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Sort the array using the given callback or "dot" notation.
     *
     * @param array                      $array
     * @param callable|array|string|null $callback
     *
     * @return array
     */
    public function sort(array $array, $callback = null)
    {
        try {
            return Arr::sort($array, $callback);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('sort', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Sort the array in descending order using the given callback or "dot" notation.
     *
     * @param array                      $array
     * @param callable|array|string|null $callback
     *
     * @return array
     */
    public function sortDesc(array $array, $callback = null)
    {
        try {
            return Arr::sortDesc($array, $callback);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('sortDesc', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Recursively sort an array by keys and values.
     *
     * @param array $array
     * @param int   $options
     * @param bool  $descending
     *
     * @return array
     */
    public function sortRecursive(array $array, int $options = SORT_REGULAR, $descending = false)
    {
        try {
            return Arr::sortRecursive($array, $options, $descending);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('sortRecursive', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Recursively sort an array by keys and values in descending order.
     *
     * @param array $array
     * @param int   $options
     *
     * @return array
     */
    public function sortRecursiveDesc(array $array, int $options = SORT_REGULAR)
    {
        try {
            return Arr::sortRecursiveDesc($array, $options);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('sortRecursiveDesc', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Conditionally compile classes from an array into a CSS class list.
     *
     * @param array $array
     *
     * @return string
     */
    public function toCssClasses(array $array)
    {
        try {
            return Arr::toCssClasses($array);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('toCssClasses', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Conditionally compile styles from an array into a style list.
     *
     * @param array $array
     *
     * @return string
     */
    public function toCssStyles(array $array)
    {
        try {
            return Arr::toCssStyles($array);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('toCssStyles', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Filter the array using the given callback.
     *
     * @param array    $array
     * @param callable $callback
     *
     * @return array
     */
    public function where(array $array, callable $callback)
    {
        try {
            return Arr::where($array, $callback);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('where', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * Filter items where the value is not null.
     *
     * @param array $array
     *
     * @return array
     */
    public function whereNotNull(array $array)
    {
        try {
            return Arr::whereNotNull($array);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('whereNotNull', 'App\\Helpers\\Arrays');
        }
    }

    /**
     * If the given value is not an array and not null, wrap it in one.
     *
     * @param mixed $value
     *
     * @return array
     */
    public function wrap($value)
    {
        try {
            return Arr::wrap($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('wrap', 'App\\Helpers\\Arrays');
        }
    }
}
