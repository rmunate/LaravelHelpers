---
title: Default Classes
editLink: true
outline: deep
---

# Default Classes

After installing the dependency in your project, you can generate the initial structure for helpers by running the following command:

```shell
php artisan helper:init
```

## Helpers Folder

This will create a folder named `Helpers` inside the `app/` directory, where you will find the standard classes suggested for creating your own helpers.

The structure of the `Helpers` folder will be as follows:

```shell
app/
└── Helpers/
    └── Arr.php
    └── Date.php
    └── File.php
    └── Number.php
    └── Str.php
    //...
```

These classes will replace the default classes exposed by the Laravel framework. For example, `Illuminate\Support\Str` will no longer need to be invoked. To use any of the helpers originally integrated into the framework, simply call the `App\Helpers\Str` class.

```php
use App\Helpers\Str;

$string = Str::ucfirst('foo bar');

// Foo bar
```

## Creating New Methods

In the corresponding `App\Helpers\*` class, you can create methods that are convenient for your project. For example, following this example, we will create a string class that brings a bit of `Python` flavor to `PHP`.

```php
class Str extends BaseHelpers
{
    /**
     * Fill the string with zeros on the left to reach the specified length.
     *
     * @param string $input The input string.
     * @param int $width The desired width of the output string.
     * @return string The zero-filled string.
     */
    public static function zfill(string $input, int $width): string {

        /**
         * Check if the input string length is already
         * greater than or equal to the desired width
         */
        if (strlen($input) >= $width) {
            return $input;
        }

        /* Calculate the number of zeros needed */
        $zerosNeeded = $width - strlen($input);

        /* Pad the string with zeros on the left */
        return str_repeat('0', $zerosNeeded) . $input;
    }
}
```

You can now invoke the class whenever and wherever you need it.

```php
use App\Helpers\Str;

Str::zfill('42', 5);
// Output: 00042
```