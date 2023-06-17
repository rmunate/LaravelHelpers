# Standard Creation and Use of Helpers within (Laravel PHP Framework) v1.0.1
[---- Documentación En Español ----](README_SPANISH.md)

![Logo](https://github.com/rmunate/PHP2JS/assets/91748598/447112ed-7993-4808-bfb8-fd85da3c0010)

## Standard creation and use of helpers within the Laravel framework through classes, a simple, efficient, and elegant way to execute your application's own methods from any class or view.

- Call helpers in the views, components, and classes of your application without needing to instantiate the Helper class.
- Organize your helpers into classes dedicated to managing their functions. Think of it as categories, where you'll have all the helpers organized according to their use.
- Static instantiation without the need to create an object to call any helper.
- Create the categories required by your application and customize the functions.
- If desired, you can directly access the class that contains your methods from controllers.
- Maintain a standard in the process of creating and using helpers within your application. It's time to standardize how to create and use them.

## _Installation via Composer_

```shell
composer require rmunate/laravel_helpers
```

## Ways to Use It
Once you have installed the dependency within your project, you can start the structure of your helpers using the following command:

```shell
php artisan generate:helpers
```

This will create a folder named `Helpers` within `App/` where you will find the suggested standard classes for creating your own helpers. It is recommended to create helpers depending on their category of use.

```css
app/
└── Helpers/
    └── Strings.php
    └── Arrays.php
    //..
```

For example, if you are going to create a function that adjusts text strings according to some application-specific requirement, you should create the method inside the `Strings` class.

The methods you create within the chosen class should always have their method name starting with the first word in lowercase and from the second word in uppercase (camelCase).

```php
<?php
namespace App\Helpers;

use Rmunate\LaravelHelpers\BaseHelpers;

class General extends BaseHelpers
{
    public function myMethod() {
        // Your Code...
    }
}
```

Now that you have defined the methods, you can call them from anywhere in your application using the following syntax: start with the word `Helper`, followed by the static call `::`, then write the lowercase name of the helper category, in this case, `general`, and finally the method name in `PascalCase`.

Example of using the `myMethod` method:

Controllers or Classes:

```php
// General is the class, so we'll write its full name in lowercase.
// From the second word onwards, we'll use PascalCase.
Helper::generalMyMethod();
```

Views or Components:

```php
{{ Helper::generalMyMethod() }}
```

Similarly, since the place where you write the helpers is a class, you can directly call the class that needs to be extended or imported for use. For this purpose, the `instance()` method is included, and you can use it as follows:

```php
// Import the usage of the class.
use App\Helpers\Strings;

// You can directly call the methods through this static call.
Strings::instance()->myMethod();
```

If you want a category that is not provided by the existing classes, no problem! Just execute the following command to create the new category:

```shell
# Replace "Category" with the name you require
php artisan create:helper Category
```

An efficient, clear, clean, and elegant way to create and manage your own functions.

## Creator
- 🇨🇴 Raúl Mauricio Uñate Castro. (raulmauriciounate@gmail.com)

Help me with your suggestions!

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
