# Standard creation and use of helpers within the Laravel PHP Framework | v2.x
⚙️ This library is compatible with Laravel versions 8.0 and above ⚙️

[![Laravel 8.0+](https://img.shields.io/badge/Laravel-8.0%2B-orange.svg)](https://laravel.com)
[![Laravel 9.0+](https://img.shields.io/badge/Laravel-9.0%2B-orange.svg)](https://laravel.com)
[![Laravel 10.0+](https://img.shields.io/badge/Laravel-10.0%2B-orange.svg)](https://laravel.com)

![Logo](https://github.com/rmunate/PHP2JS/assets/91748598/447112ed-7993-4808-bfb8-fd85da3c0010)

📖 [**DOCUMENTACIÓN EN ESPAÑOL**](README_SPANISH.md) 📖

## Table of Contents
- [Introduction](#introduction)
- [Installation](#installation)
- [Usage](#usage)
- [Calling Helpers](#calling-helpers)
- [Creating a New Category](#creating-a-new-category)
- [Creator](#creator)
- [License](#license)

## Introduction
Empower your Laravel journey: Unleash the power of helpers! Unlock a world of possibilities with our standard creation and seamless utilization of helpers within the Laravel framework. Our solution offers a simple, efficient, and elegant way to execute your application's custom methods from any class or view, making development a breeze. Supercharge your Laravel project and elevate your coding experience with our Helper Library.

We will guide the use of Helpers by organizing them into categories.

For many years, I have been using Laravel, and I believe it is the framework that brings the best out of PHP. However, the creation of Helpers has not been standardized within this framework. Therefore, I decided to create a standard and implement it in various systems and companies for which I have worked.

**Now you have it as a library!**

It's time to standardize how to create and use them.

## Installation
To install the package via Composer, run the following command:

```shell
composer require rmunate/laravel_helpers
```

This will download the latest available version of the package.

## Usage
After installing the dependency in your project, you can generate the initial structure of the helpers by executing the following command:

```shell
php artisan generate:helpers
```

This will create a folder called `Helpers` inside `App/`, where you will find suggested standard classes for creating your own helpers.

The structure of the `Helpers` folder will be as follows:

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

Each class represents a category of helpers.
The classes will not have methods defined; you will start defining the ones your application requires.

You can organize your helpers into different categories by creating dedicated classes for each of them. For example, if you want to create functions related to text strings, you can use the `Strings` class.

## Calling Helpers
To call the helpers from anywhere in your application, use the following syntax:

- Controllers or Classes:
  ```php
  use Helper;
  
  Helper::categoryNameMethod();
  ```

- Views or Components:
  ```php
  {{ Helper::categoryNameMethod() }}
  ```

You can also import and directly use the class of the required category by using the `helpers()` or `helper()` method. For example:

```php
use App\Helpers\Strings;

/**
 * Using the helpers() or helper() method
 */
Strings::helpers()->methodName(); //Strings::helper()->methodName();

```

## Creating a New Category
If you want to create a new category of helpers, execute the following command:

```shell
php artisan create:helper CategoryName
```
Replace `CategoryName` with the desired name for the new category. The name must not contain numbers, accents, or special characters.

## Creator
- 🇨🇴 Raúl Mauricio Uñate Castro
- Email: raulmauriciounate@gmail.com

## License
This project is under the [MIT License](https://choosealicense.com/licenses/mit/).

🌟 Support My Projects! 🚀

Make any contributions you see fit; the code is entirely yours. Together, we can do amazing things and improve the world of development. Your support is invaluable. ✨

If you have ideas, suggestions, or just want to collaborate, we are open to everything! Join our community and be part of our journey to success! 🌐👩‍💻👨‍💻