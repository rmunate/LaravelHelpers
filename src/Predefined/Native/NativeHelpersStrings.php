<?php

namespace Rmunate\LaravelHelpers\Predefined\Native;

use Illuminate\Support\Str;
use Rmunate\LaravelHelpers\Exceptions\HelpersGeneralException;

/**
 * These are the native methods included in the framework.
 * Only those initialized with Str:: are considered.
 */
trait NativeHelpersStrings
{
    /**
     * Get a new stringable object from the given string.
     *
     * @param string $string
     *
     * @return \Illuminate\Support\Stringable
     */
    public function of($string)
    {
        try {
            return Str::of($string);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('of', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Return the remainder of a string after the first occurrence of a given value.
     *
     * @param string $subject
     * @param string $search
     *
     * @return string
     */
    public function after(string $subject, string $search)
    {
        try {
            return Str::after($subject, $search);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('after', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Return the remainder of a string after the last occurrence of a given value.
     *
     * @param string $subject
     * @param string $search
     *
     * @return string
     */
    public function afterLast(string $subject, string $search)
    {
        try {
            return Str::afterLast($subject, $search);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('afterLast', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Transliterate a UTF-8 value to ASCII.
     *
     * @param string $value
     * @param string $language
     *
     * @return string
     */
    public function ascii(string $value, string $language = 'en')
    {
        try {
            return Str::ascii($value, $language);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('ascii', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Transliterate a string to its closest ASCII representation.
     *
     * @param string      $string
     * @param string|null $unknown
     * @param bool|null   $strict
     *
     * @return string
     */
    public function transliterate(string $string, $unknown = '?', $strict = false)
    {
        try {
            return Str::transliterate($string, $unknown, $strict);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('transliterate', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Get the portion of a string before the first occurrence of a given value.
     *
     * @param string $subject
     * @param string $search
     *
     * @return string
     */
    public function before(string $subject, string $search)
    {
        try {
            return Str::before($subject, $search);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('before', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Get the portion of a string before the last occurrence of a given value.
     *
     * @param string $subject
     * @param string $search
     *
     * @return string
     */
    public function beforeLast(string $subject, string $search)
    {
        try {
            return Str::beforeLast($subject, $search);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('beforeLast', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Get the portion of a string between two given values.
     *
     * @param string $subject
     * @param string $from
     * @param string $to
     *
     * @return string
     */
    public function between(string $subject, string $from, string $to)
    {
        try {
            return Str::between($subject, $search);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('between', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Get the smallest possible portion of a string between two given values.
     *
     * @param string $subject
     * @param string $from
     * @param string $to
     *
     * @return string
     */
    public function betweenFirst(string $subject, string $from, string $to)
    {
        try {
            return Str::betweenFirst($subject, $from, $to);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('betweenFirst', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Convert a value to camel case.
     *
     * @param string $value
     *
     * @return string
     */
    public function camel(string $value)
    {
        try {
            return Str::camel($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('camel', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Get the character at the specified index.
     *
     * @param string $subject
     * @param int    $index
     *
     * @return string|false
     */
    public function charAt(string $subject, int $index)
    {
        try {
            return Str::charAt($subject, $index);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('charAt', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Determine if a given string contains a given substring.
     *
     * @param string                  $haystack
     * @param string|iterable<string> $needles
     * @param bool                    $ignoreCase
     *
     * @return bool
     */
    public function contains(string $haystack, $needles, $ignoreCase = false)
    {
        try {
            return Str::contains($haystack, $needles, $ignoreCase);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('contains', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Determine if a given string contains all array values.
     *
     * @param string $haystack
     * @param array  $needles
     * @param bool   $ignoreCase
     *
     * @return bool
     */
    public function containsAll(string $haystack, array $needles, $ignoreCase = false)
    {
        try {
            return Str::containsAll($haystack, $needles, $ignoreCase);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('containsAll', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Determine if a given string ends with a given substring.
     *
     * @param string                  $haystack
     * @param string|iterable<string> $needles
     *
     * @return bool
     */
    public function endsWith(string $haystack, $needles)
    {
        try {
            return Str::endsWith($haystack, $needles);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('endsWith', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Extracts an excerpt from text that matches the first instance of a phrase.
     *
     * @param string $text
     * @param string $phrase
     * @param array  $options
     *
     * @return string|null
     */
    public function excerpt(string $text, string $phrase = '', array $options = [])
    {
        try {
            return Str::excerpt($text, $phrase, $options);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('excerpt', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Cap a string with a single instance of a given value.
     *
     * @param string $value
     * @param string $cap
     *
     * @return string
     */
    public function finish(string $value, string $cap)
    {
        try {
            return Str::finish($value, $cap);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('finish', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Wrap the string with the given strings.
     *
     * @param string      $value
     * @param string      $before
     * @param string|null $after
     *
     * @return string
     */
    public function wrap(string $value, string $before, $after = null)
    {
        try {
            return Str::wrap($value, $before, $after);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('wrap', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Determine if a given string matches a given pattern.
     *
     * @param string|iterable<string> $pattern
     * @param string                  $value
     *
     * @return bool
     */
    public function is($pattern, string $value)
    {
        try {
            return Str::is($pattern, $value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('is', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Determine if a given string is 7 bit ASCII.
     *
     * @param string $value
     *
     * @return bool
     */
    public function isAscii(string $value)
    {
        try {
            return Str::isAscii($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('isAscii', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Determine if a given value is valid JSON.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isJson($value)
    {
        try {
            return Str::isJson($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('isJson', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Determine if a given value is a valid URL.
     *
     * @param mixed $value
     * @param array $protocols
     *
     * @return bool
     */
    public function isUrl($value, array $protocols = [])
    {
        try {
            return Str::isUrl($value, $protocols);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('isUrl', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Determine if a given value is a valid UUID.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isUuid($value)
    {
        try {
            return Str::isUuid($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('isUuid', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Determine if a given value is a valid ULID.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isUlid($value)
    {
        try {
            return Str::isUlid($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('isUlid', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Convert a string to kebab case.
     *
     * @param string $value
     *
     * @return string
     */
    public function kebab(string $value)
    {
        try {
            return Str::kebab($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('kebab', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Return the length of the given string.
     *
     * @param string      $value
     * @param string|null $encoding
     *
     * @return int
     */
    public function length(string $value, $encoding = null)
    {
        try {
            return Str::length($value, $encoding);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('length', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Limit the number of characters in a string.
     *
     * @param string $value
     * @param int    $limit
     * @param string $end
     *
     * @return string
     */
    public function limit(string $value, int $limit = 100, string $end = '...')
    {
        try {
            return Str::limit($value, $limit = 100, $end);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('limit', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Convert the given string to lower-case.
     *
     * @param string $value
     * @param string $encoding
     *
     * @return string
     */
    public function lower(string $value)
    {
        try {
            return Str::lower($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('lower', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Limit the number of words in a string.
     *
     * @param string $value
     * @param int    $words
     * @param string $end
     *
     * @return string
     */
    public function words(string $value, int $words = 100, string $end = '...')
    {
        try {
            return Str::words($value, $words, $end);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('words', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Converts GitHub flavored Markdown into HTML.
     *
     * @param string $string
     * @param array  $options
     *
     * @return string
     */
    public function markdown(string $string, array $options = [])
    {
        try {
            return Str::markdown($string, $options);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('markdown', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Converts inline Markdown into HTML.
     *
     * @param string $string
     * @param array  $options
     *
     * @return string
     */
    public function inlineMarkdown(string $string, array $options = [])
    {
        try {
            return Str::inlineMarkdown($string, $options);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('inlineMarkdown', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Masks a portion of a string with a repeated character.
     *
     * @param string   $string
     * @param string   $character
     * @param int      $index
     * @param int|null $length
     * @param string   $encoding
     *
     * @return string
     */
    public function mask(string $string, string $character, int $index, $length = null, string $encoding = 'UTF-8')
    {
        try {
            return Str::mask($string, $character, $index, $length, $encoding);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('mask', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Get the string matching the given pattern.
     *
     * @param string $pattern
     * @param string $subject
     *
     * @return string
     */
    public function match(string $pattern, string $subject)
    {
        try {
            return Str::match($pattern, $subject);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('match', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Determine if a given string matches a given pattern.
     *
     * @param string|iterable<string> $pattern
     * @param string                  $value
     *
     * @return bool
     */
    public function isMatch($pattern, string $value)
    {
        try {
            return Str::isMatch($pattern, $value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('isMatch', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Get the string matching the given pattern.
     *
     * @param string $pattern
     * @param string $subject
     *
     * @return \Illuminate\Support\Collection
     */
    public function matchAll($pattern, $subject)
    {
        try {
            return Str::matchAll($pattern, $value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('matchAll', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Pad both sides of a string with another.
     *
     * @param string $value
     * @param int    $length
     * @param string $pad
     *
     * @return string
     */
    public function padBoth(string $value, int $length, string $pad = ' ')
    {
        try {
            return Str::padBoth($value, $length, $pad);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('padBoth', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Pad the left side of a string with another.
     *
     * @param string $value
     * @param int    $length
     * @param string $pad
     *
     * @return string
     */
    public function padLeft(string $value, int $length, string $pad = ' ')
    {
        try {
            return Str::padLeft($value, $length, $pad);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('padLeft', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Pad the right side of a string with another.
     *
     * @param string $value
     * @param int    $length
     * @param string $pad
     *
     * @return string
     */
    public function padRight(string $value, int $length, string $pad = ' ')
    {
        try {
            return Str::padRight($value, $length, $pad);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('padRight', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Parse a Class[@]method style callback into class and method.
     *
     * @param string      $callback
     * @param string|null $default
     *
     * @return array<int, string|null>
     */
    public function parseCallback($callback, $default = null)
    {
        try {
            return Str::parseCallback($callback, $default);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('parseCallback', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Get the plural form of an English word.
     *
     * @param string               $value
     * @param int|array|\Countable $count
     *
     * @return string
     */
    public function plural(string $value, $count = 2)
    {
        try {
            return Str::plural($value, $count);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('plural', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Pluralize the last word of an English, studly caps case string.
     *
     * @param string               $value
     * @param int|array|\Countable $count
     *
     * @return string
     */
    public function pluralStudly(string $value, $count = 2)
    {
        try {
            return Str::pluralStudly($value, $count);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('pluralStudly', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Generate a random, secure password.
     *
     * @param int  $length
     * @param bool $letters
     * @param bool $numbers
     * @param bool $symbols
     * @param bool $spaces
     *
     * @return string
     */
    public function password(int $length = 32, $letters = true, $numbers = true, $symbols = true, $spaces = false)
    {
        try {
            return Str::password($length, $letters, $numbers, $symbols, $spaces);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('password', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param int $length
     *
     * @return string
     */
    public function random(int $length = 16)
    {
        try {
            return Str::random($length);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('random', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Set the callable that will be used to generate random strings.
     *
     * @param callable|null $factory
     *
     * @return void
     */
    public function createRandomStringsUsing(callable $factory = null)
    {
        try {
            Str::createRandomStringsUsing($factory);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('createRandomStringsUsing', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Set the sequence that will be used to generate random strings.
     *
     * @param array         $sequence
     * @param callable|null $whenMissing
     *
     * @return void
     */
    public function createRandomStringsUsingSequence(array $sequence, $whenMissing = null)
    {
        try {
            Str::createRandomStringsUsingSequence($sequence, $whenMissing);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('createRandomStringsUsingSequence', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Indicate that random strings should be created normally and not using a custom factory.
     *
     * @return void
     */
    public function createRandomStringsNormally()
    {
        try {
            Str::createRandomStringsNormally();
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('createRandomStringsNormally', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Repeat the given string.
     *
     * @param string $string
     * @param int    $times
     *
     * @return string
     */
    public function repeat(string $string, int $times)
    {
        try {
            return Str::repeat($string, $times);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('repeat', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Replace a given value in the string sequentially with an array.
     *
     * @param string           $search
     * @param iterable<string> $replace
     * @param string           $subject
     *
     * @return string
     */
    public function replaceArray(string $search, $replace, string $subject)
    {
        try {
            return Str::replaceArray($search, $replace, $subject);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('replaceArray', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Replace the given value in the given string.
     *
     * @param string|iterable<string> $search
     * @param string|iterable<string> $replace
     * @param string|iterable<string> $subject
     * @param bool                    $caseSensitive
     *
     * @return string|string[]
     */
    public function replace($search, $replace, $subject, $caseSensitive = true)
    {
        try {
            return Str::replace($search, $replace, $subject, $caseSensitive);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('replace', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param string $search
     * @param string $replace
     * @param string $subject
     *
     * @return string
     */
    public function replaceFirst(string $search, string $replace, string $subject)
    {
        try {
            return Str::replaceFirst($search, $replace, $subject);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('replaceFirst', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Replace the first occurrence of the given value if it appears at the start of the string.
     *
     * @param string $search
     * @param string $replace
     * @param string $subject
     *
     * @return string
     */
    public function replaceStart(string $search, string $replace, string $subject)
    {
        try {
            return Str::replaceStart($search, $replace, $subject);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('replaceStart', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Replace the last occurrence of a given value in the string.
     *
     * @param string $search
     * @param string $replace
     * @param string $subject
     *
     * @return string
     */
    public function replaceLast(string $search, string $replace, string $subject)
    {
        try {
            return Str::replaceLast($search, $replace, $subject);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('replaceLast', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Replace the last occurrence of a given value if it appears at the end of the string.
     *
     * @param string $search
     * @param string $replace
     * @param string $subject
     *
     * @return string
     */
    public function replaceEnd(string $search, string $replace, string $subject)
    {
        try {
            return Str::replaceEnd($search, $replace, $subject);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('replaceEnd', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Remove any occurrence of the given string in the subject.
     *
     * @param string|iterable<string> $search
     * @param string|iterable<string> $subject
     * @param bool                    $caseSensitive
     *
     * @return string
     */
    public function remove($search, $subject, $caseSensitive = true)
    {
        try {
            return Str::remove($search, $replace, $caseSensitive);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('remove', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Reverse the given string.
     *
     * @param string $value
     *
     * @return string
     */
    public function reverse(string $value)
    {
        try {
            return Str::reverse($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('reverse', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Begin a string with a single instance of a given value.
     *
     * @param string $value
     * @param string $prefix
     *
     * @return string
     */
    public function start(string $value, string $prefix)
    {
        try {
            return Str::start($value, $prefix);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('start', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Convert the given string to upper-case.
     *
     * @param string $value
     *
     * @return string
     */
    public function upper(string $value)
    {
        try {
            return Str::upper($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('upper', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Convert the given string to title case.
     *
     * @param string $value
     *
     * @return string
     */
    public function title(string $value)
    {
        try {
            return Str::title($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('title', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Convert the given string to title case for each word.
     *
     * @param string $value
     *
     * @return string
     */
    public function headline(string $value)
    {
        try {
            return Str::headline($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('headline', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Get the singular form of an English word.
     *
     * @param string $value
     *
     * @return string
     */
    public function singular(string $value)
    {
        try {
            return Str::singular($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('singular', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param string                $title
     * @param string                $separator
     * @param string|null           $language
     * @param array<string, string> $dictionary
     *
     * @return string
     */
    public function slug(string $title, string $separator = '-', $language = 'en', $dictionary = ['@' => 'at'])
    {
        try {
            return Str::slug($title, $separator, $language, $dictionary);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('slug', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Convert a string to snake case.
     *
     * @param string $value
     * @param string $delimiter
     *
     * @return string
     */
    public function snake(string $value, string $delimiter = '_')
    {
        try {
            return Str::snake($value, $delimiter);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('snake', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Remove all "extra" blank space from the given string.
     *
     * @param string $value
     *
     * @return string
     */
    public function squish(string $value)
    {
        try {
            return Str::squish($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('squish', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Determine if a given string starts with a given substring.
     *
     * @param string                  $haystack
     * @param string|iterable<string> $needles
     *
     * @return bool
     */
    public function startsWith(string $haystack, $needles)
    {
        try {
            return Str::startsWith($haystack, $needle);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('startsWith', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Convert a value to studly caps case.
     *
     * @param string $value
     *
     * @return string
     */
    public function studly(string $value)
    {
        try {
            return Str::studly($value);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('studly', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Returns the portion of the string specified by the start and length parameters.
     *
     * @param string   $string
     * @param int      $start
     * @param int|null $length
     * @param string   $encoding
     *
     * @return string
     */
    public function substr(string $string, int $start, $length = null, string $encoding = 'UTF-8')
    {
        try {
            return Str::substr($string, $start, $length, $encoding);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('substr', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Returns the number of substring occurrences.
     *
     * @param string   $haystack
     * @param string   $needle
     * @param int      $offset
     * @param int|null $length
     *
     * @return int
     */
    public function substrCount(string $haystack, string $needle, int $offset = 0, $length = null)
    {
        try {
            return Str::substrCount($haystack, $needle, $offset, $length);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('substrCount', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Replace text within a portion of a string.
     *
     * @param string|string[] $string
     * @param string|string[] $replace
     * @param int|int[]       $offset
     * @param int|int[]|null  $length
     *
     * @return string|string[]
     */
    public function substrReplace($string, $replace, $offset = 0, $length = null)
    {
        try {
            return Str::substrReplace($string, $replace, $offset, $length);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('substrReplace', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Swap multiple keywords in a string with other keywords.
     *
     * @param array  $map
     * @param string $subject
     *
     * @return string
     */
    public function swap(array $map, string $subject)
    {
        try {
            return Str::swap($map, $subject);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('swap', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Make a string's first character lowercase.
     *
     * @param string $string
     *
     * @return string
     */
    public function lcfirst(string $string)
    {
        try {
            return Str::lcfirst($string);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('lcfirst', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Make a string's first character uppercase.
     *
     * @param string $string
     *
     * @return string
     */
    public function ucfirst(string $string)
    {
        try {
            return Str::ucfirst($string);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('ucfirst', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Split a string into pieces by uppercase characters.
     *
     * @param string $string
     *
     * @return string[]
     */
    public function ucsplit(string $string)
    {
        try {
            return Str::ucsplit($string);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('ucsplit', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Get the number of words a string contains.
     *
     * @param string      $string
     * @param string|null $characters
     *
     * @return int
     */
    public function wordCount(string $string, $characters = null)
    {
        try {
            return Str::wordCount($string, $characters);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('wordCount', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Wrap a string to a given number of characters.
     *
     * @param string $string
     * @param int    $characters
     * @param string $break
     * @param bool   $cutLongWords
     *
     * @return string
     */
    public function wordWrap(string $string, int $characters = 75, string $break = "\n", $cutLongWords = false)
    {
        try {
            return Str::wordWrap($string, $characters, $break, $cutLongWords);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('wordWrap', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Generate a UUID (version 4).
     *
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function uuid()
    {
        try {
            return Str::uuid();
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('uuid', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Generate a time-ordered UUID (version 4).
     *
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function orderedUuid()
    {
        try {
            return Str::orderedUuid();
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('orderedUuid', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Set the callable that will be used to generate UUIDs.
     *
     * @param callable|null $factory
     *
     * @return void
     */
    public function createUuidsUsing(callable $factory = null)
    {
        try {
            Str::createUuidsUsing($factory);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('createUuidsUsing', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Set the sequence that will be used to generate UUIDs.
     *
     * @param array         $sequence
     * @param callable|null $whenMissing
     *
     * @return void
     */
    public function createUuidsUsingSequence(array $sequence, $whenMissing = null)
    {
        try {
            Str::createUuidsUsingSequence($sequence, $whenMissing);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('createUuidsUsingSequence', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Always return the same UUID when generating new UUIDs.
     *
     * @param \Closure|null $callback
     *
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function freezeUuids($callback)
    {
        try {
            return Str::freezeUuids($callback);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('freezeUuids', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Indicate that UUIDs should be created normally and not using a custom factory.
     *
     * @return void
     */
    public function createUuidsNormally()
    {
        try {
            Str::createUuidsNormally();
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('createUuidsNormally', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Generate a ULID.
     *
     * @param \DateTimeInterface|null $time
     *
     * @return \Symfony\Component\Uid\Ulid
     */
    public function ulid($time = null)
    {
        try {
            return Str::ulid($time);
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('ulid', 'App\\Helpers\\Strings');
        }
    }

    /**
     * Remove all strings from the casing caches.
     *
     * @return void
     */
    public function flushCache()
    {
        try {
            Str::flushCache();
        } catch (\Throwable $th) {
            throw HelpersGeneralException::methodUndefined('flushCache', 'App\\Helpers\\Strings');
        }
    }
}
