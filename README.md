# Helper Management Standard (Laravel PHP Framework) v1.0.0

![Logo](https://github.com/rmunate/PHP2JS/assets/91748598/447112ed-7993-4808-bfb8-fd85da3c0010)

## Handling helpers in the Laravel framework through classes, a simple and efficient way to execute your application's own methods.
- Call the helpers on the views, components and classes of your application without extending the base class.
- Organize your helpers into classes dedicated to managing your functions.
- Instance statically without the need to create objects to call methods.
- Create the categories that your application requires and customize the functions.
- If you wish, you can directly access the class that contains your methods.
- Manage a standard in the process of creating and using helpers within your application.

## _Installation via Composer_

```shell
composer require rmunate/laravel_helpers
```


## Use
When you have installed the dependency inside your project, you can start the structure of your helpers through the command:

```shell
php artisan generate:helpers
```
This will create within your project a folder within `App/` with the name `Helpers`, where you will find the standard classes for the creation of the application's own helpers, the ideal is that you create the helpers depending on their category of use.

```css
app/
└── Helpers/
    └── Strings.php
    └── Arrays.php
    //..

```

Example If you are going to create a function that adjusts your text according to some feature that the application requires, you should create the method inside the `Strings` class.

The methods that you create within the class that you decide to use, must always have their method name starting with the first word in `lowercase` and from the second in `uppercase`. `(camelCase)`

```php
<?php
namespace App\Helpers;

use Rmunate\LaravelHelpers\BaseHelpers;

class General extends BaseHelpers
{
    public function myMethod() {
        // code
    }
}
```

Now that you have defined the methods, you can call them from anywhere in your application by applying the following syntax, you will put the word `Helper` followed by the static call `::` then you will put the name of the helper category in lowercase, for this case "general" and finally the name of the method in `“PascalCase”`, example of use of the previous method.

Controllers or Classes:
```php
Helper::generalMyMethod();
```

Views or Components:
```php
{{ Helper::generalMyMethod() }}
```

In the same way, since the place where you write the helpers is a class, you can directly call the class that does need to be extended or imported for use, for this purpose the instance() method is included, you can use it as follows manner:

```php
use App\Helpers\Strings;
Strings::instance()->myMethod();
```

You want a category that is not in the supplied databases, Easy! Just execute the following command to create the new category:

```shell
# replace "Category" with the name you require
php artisan create:helper Category
```

A more efficient, clear, clean and elegant way to create and manage your own functions.

## Creator
- 🇨🇴 Raúl Mauricio Uñate Castro. (raulmauriciounate@gmail.com)

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
