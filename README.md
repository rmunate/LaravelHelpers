Here's the provided markdown translated into English:

# Standard for Creating and Using Helpers in Laravel PHP Framework | v2.x

⚙️ This library is compatible with Laravel versions 8.0 and higher ⚙️

[![Laravel 8.0+](https://img.shields.io/badge/Laravel-8.0%2B-orange.svg)](https://laravel.com)
[![Laravel 9.0+](https://img.shields.io/badge/Laravel-9.0%2B-orange.svg)](https://laravel.com)
[![Laravel 10.0+](https://img.shields.io/badge/Laravel-10.0%2B-orange.svg)](https://laravel.com)

![Logo-laravel_helpers](https://github.com/alejandrodiazpinilla/LaravelHelpers/assets/51100789/196c643d-a5f7-4c23-be17-275610608fef)

📖 [**DOCUMENTACIÓN EN ESPAÑOL**](README_SPANISH.md) 📖

## Table of Contents

- [Introduction](#introduction)
- [Installation](#installation)
- [Usage](#usage)
  - [Loading Default Categories](#loading-default-categories)
  - [Creating a New Category](#creating-a-new-category)
  - [Standard for Creating a New Helper](#standard-for-creating-a-new-helper)
  - [Calling Helpers](#calling-helpers)
  - [Invoking Methods Already Available in Laravel](#invoking-methods-already-available-in-laravel)
- [New Helpers by Category](#new-helpers-by-category)
- [How to Contribute?](#how-to-contribute)
- [Creator](#creator)
- [License](#license)

## Introduction

For many years, I have been using Laravel, and I believe it is the framework that gives PHP the best life. However, within this framework, there has been no standardization of helper creation. So, I decided to create a standard and implement it in various systems and companies I have worked for. Many colleagues have decided to support this initiative, and we aim to create a powerful feature in Laravel.

Our solution provides a simple, efficient, and elegant way to execute custom methods in your application from any class or view, making development much easier. Improve your Laravel project while maintaining code elegance and cleanliness with this package.

We have oriented the use of helpers towards classes, and most importantly, we have centralized the existing helpers in Laravel through the categories of this package. We include Laravel's native functionalities accessible through classes such as `Str::` and `Arr::`. Other helpers that are not accessed through classes but as functions should continue to be used as presented in the official Laravel documentation.

It's time to standardize how to create and use helpers in our projects.

## Installation

To install the dependency via **composer**, run the following command:

```shell
composer require rmunate/laravel_helpers
```

This will download the latest available version of the package. Starting from version +2.0, we began consolidating various new solutions that are not included in the framework's source code. You can also contribute your own helpers, as described in the contribution section.

## Usage

### Loading Default Categories

After installing the dependency in your project, you can generate the initial structure of helpers by running the following command:

```shell
php artisan helpers:init
```

This will create a folder called `Helpers` inside the `app\` folder, where you will find suggested standard classes for creating your own helpers. The structure of the `Helpers` folder will be as follows:

```css
app/
└── Helpers/
    └── DateTime.php
    └── File.php
    └── General.php
    └── Html.php
    └── Security.php
    └── Strings.php
    //...
```

Each class represents a category of helpers. These classes will, by default, import two `traits`, which allow you to use both existing Laravel helpers and new helpers provided by the package. In these classes, you can start defining methods specific to your application, which can then be easily invoked.

### Creating a New Category

If you want to create a new category of helpers, run the following command:

```shell
php artisan helpers:create CategoryName
```

Replace `CategoryName` with the desired name for the new category. This name should not contain numbers, accents, or special characters. This will create a new file at the path `App\Helpers\CategoryName.php`, where you can start defining the methods you need.

### Standard for Creating a New Helper

Here, we will create an example helper to provide a better understanding of the standard we will follow when creating your own solutions.
- Methods should be `public`.
- It is not recommended to define `static` methods.
- It is not recommended to define `protected` methods.
- It is not recommended to define constants or properties inside the class since the methods will be independently usable.
- The method name should always start with the first word in lowercase and capitalize each subsequent word without special characters.

```php
class DateTime extends BaseHelpers
{
   

 use NativeHelpersDateTime, AdditionalHelpersDateTime;
    
    /**
     * This example helper will be used to determine if a given date belongs to a Monday.
     *
     * @param string $date
     * @return bool
     */
    public function isMonday(string $date) : bool
    {
      return date('N', strtotime($date)) == 1;
    }
}
```

### Calling Helpers
To call helpers from anywhere in your application, use the following syntax:

**Controllers or Classes:**
```php
use Helper;

/**
 * Syntax:
 * First Word => full class name in lowercase
 * Starting from the Second Word => method name with each word capitalized
 */
Helper::categoryMethodName();

/**
 * For example, to invoke the example method from this guide:
 */
Helper::datetimeIsMonday('2023-08-28');

```

**Views or Components:**
```php
{{ Helper::categoryMethodName() }}
// {{ Helper::datetimeIsMonday('2023-08-28') }}
```

You can also import and directly use the class from the category you require using the `helpers()` or `helper()` method. For example:

```php
use App\Helpers\DateTime;

DateTime::helper()->isMonday('2023-08-28');
// DateTime::helpers()->isMonday('2023-08-28');
```

### Invoking Methods Already Available in Laravel
If you need to use any of the solutions currently available in the official Laravel documentation (https://laravel.com/docs/10.x/helpers), you can do so as follows:

*Keep in mind that you only have access to methods invoked through Str:: and Arr:: classes.*

**Example of Using Array Helpers** 

Using `Arr::exists();` as an example:

```php
$array = ['name' => 'John Doe', 'age' => 17];

/* Native Laravel way */
Arr::exists($array, 'name');

/* Method through the Helpers class */
Arrays::helpers()->exists($array, 'name');

/* Provided method for standardizing the call from anywhere */
Helper::arraysExists($array, 'name');

```

**Example of Using String Helpers** 

Using `Str::uuid();` as an example:

```php
/* Native Laravel way */
Str::uuid();

/* Method through the Helpers class */
Strings::helpers()->uuid();

/* Provided method for standardizing the call from anywhere */
Helper::stringsUuid();
```

### New Helpers by Category

#### Text Strings

##### Method: `isAlphanumeric()`
Checks if all characters in the given string are alphanumeric.

```php
Helper::isAlphanumeric('AbCd1zyZ9'); //true
Helper::isAlphanumeric('foo!#$bar'); //false

Strings::helpers()->isAlphanumeric('AbCd1zyZ9'); //true
Strings::helpers()->isAlphanumeric('foo!#$bar'); //false
```

##### Method: `isAlpha()`
Verifies if all characters in the given string are alphabetic `[A-Za-z]`.

```php
Helper::isAlpha('KjgWZC'); //true
Helper::isAlpha('arf12'); //false

Strings::helpers()->isAlpha('KjgWZC'); //true
Strings::helpers()->isAlpha('arf12'); //false
```

##### Method: `isControl()`
Checks if all characters in the given string are control characters. Control characters include, for example, line feed, tab, escape.

```php
Helper::isControl("\n\r\t"); //true
Helper::isControl('arf12'); //false

Strings::helpers()->isControl("\n\r\t"); //true
Strings::helpers()->isControl('arf12'); //false
```

##### Method: `isDigit()`
Verifies if all characters in the given string are numeric.

```php
Helper::isDigit('10002'); //true
Helper::isDigit('1820.20'); //false
Helper::isDigit('wsl!12'); //false

Strings::helpers()->isDigit('10002'); //true
Strings::helpers()->isDigit('1820.20'); //false
Strings::helpers()->isDigit('wsl!12'); //false
```

##### Method: `isGraph()`
Checks if all characters in the given string, `text`, generate visible output.

```php
Helper::isGraph('arf12'); //true
Helper::isGraph('LKA#@%.54'); //true
Helper::isGraph("asdf\n\r\t"); //false

Strings::helpers()->isGraph('arf12'); //true
Strings::helpers()->isGraph('LKA#@%.54'); //true
Strings::helpers()->isGraph("asdf\n\r\t"); //false
```

##### Method: `isLower()`
Verifies if all characters in the given string are lowercase letters.

```php
Helper::isLower('qiutoas'); //true
Helper::isLower('aac123'); //false
Helper::isLower('QASsdks'); //false

Strings::helpers()->isLower('qiutoas'); //true
Strings::helpers()->isLower('aac123'); //false
Strings::helpers()->isLower('QASsdks'); //false
```

##### Method: `isPrint()`
Returns `true` if each character in the text actually generates some output (including spaces). Returns `false` if the text includes control characters or characters that do not produce any output or perform any control function after all.

```php
Helper::isPrint('arf12'); //true
Helper::isPrint('LKA#@%.54'); //true
Helper::isPrint("asdf\n\r\t"); //false

Strings::helpers()->isPrint('arf12'); //true
Strings::helpers()->isPrint('LKA#@%.54'); //true
Strings::helpers()->isPrint("asdf\n\r\t"); //false
```

##### Method: `isPunct()`
Checks if all characters in the given string are punctuation characters.

```php
Helper::isPunct('*&$()'); //true
Helper::isPunct('!@ # $'); //false
Helper::isPunct('ABasdk!@!$#'); //false

Strings::helpers()->isPunct('*&$()'); //true
Strings::helpers()->isPunct('!@ # $'); //false
Strings::helpers()->isPunct('ABasdk!@!$#'); //false
```

##### Method: `isSpace()`
Verifies if all characters in the given string create white spaces. Returns `true` if each character in the string generates some form of white space, or `false` otherwise. Along with the regular space character, tab, vertical tab, line feed, carriage return, and form feed characters are also considered spaces.

```php
Helper::isSpace("\n\r\t"); //true
Helper::isSpace("\narf12"); //false
Helper::isSpace('\n\r\t'); //false // note the single quotes

Strings::helpers()->isSpace("\n\r\t"); //true
Strings::helpers()->isSpace("\narf12"); //false
Strings::helpers()->isSpace('\n\r\t'); //false // note the single quotes
```

##### Method: `isUpper()`
Verifies if all characters in the given string are uppercase letters.

```php
Helper::isUpper('LMNSDO'); //true
Helper::isUpper('AKLWC139'); //false
Helper::isUpper('akwSKWsm'); //false

Strings::helpers()->isUpper('LMNSDO'); //true
Strings::helpers()->isUpper('AKLWC139'); //false
Strings::helpers()->isUpper('akwSKWsm'); //false
```

##### Method: `isHex()`
Checks if all characters in the given string are hexadecimal digits.

```php
Helper::isHex('AB10BC99'); //true
Helper::isHex('ab12bc99'); //true
Helper::isHex('AR1012'); //false

Strings::helpers()->isHex('AB10BC99'); //true
Strings::helpers()->isHex('ab12bc99'); //true
Strings::helpers()->isHex('AR1012'); //false
```

## How to Contribute?

Your contribution is very important in this package, and the contribution process is simple. You can fork this project with complete confidence. Once you have the fork in your profile, you can start contributing new methods that you find useful in the `traits` found in the `src/Predefined/Additional/` path. Always remember to comment each of the methods you suggest according to the phpDoc standard. Then, create a Pull Request to the main branch of this repository. We will review your contributions and accept solutions that are correctly constructed. Finally, in the Readme, create a section under `New Helpers by Category` that demonstrates how to use your solution. Your support is invaluable. ✨

## Creator

- 🇨🇴 Raúl Mauricio Uñate Castro
- Email: raulmauriciounate@gmail.com

## License

This project is under the [MIT License](https://choosealicense.com/licenses/mit/).

🌟 Support My Projects! 🚀

Feel free to make the contributions you see fit; the code is entirely yours. Together, we can do amazing things and improve the world of development. Your support is invaluable. ✨

If you have ideas, suggestions, or just want to collaborate, we're open to it all! Join our community and be part of our journey to success! 🌐👩‍💻👨‍💻
