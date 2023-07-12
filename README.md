# Standard creation and usage of helpers within (Laravel PHP Framework) | v1.x

![Logo](https://github.com/rmunate/PHP2JS/assets/91748598/447112ed-7993-4808-bfb8-fd85da3c0010)

[**---- Documentación En Español ----**](README_SPANISH.md)
## Table of Contents
- [Introduction](#introduction)
- [Installation](#installation)
- [Usage](#usage)
- [Calling Helpers](#calling-helpers)
- [Creating a New Category](#creating-a-new-category)
- [Creator](#creator)
- [License](#license)

## Introduction
This is a standard for the creation and usage of helpers within Laravel. It provides a simple and elegant way to execute custom methods from any class or view in your application.

We will guide the usage of helpers in object-oriented categories.

I have been using Laravel for many years, and I believe it is the framework that gives PHP a better life. However, the creation of helpers has not been standardized within this framework. Therefore, I decided to create a standard and implement it in different systems and companies I have worked for.

**Now you have it as a library!**

It's time to standardize how to create and use helpers.

## Installation
To install the dependency via Composer, execute the following command:

```shell
composer require rmunate/laravel_helpers
```

This will download the latest available version of the package.

## Usage
After installing the dependency in your project, you can generate the initial structure of the helpers by executing the following command:

```shell
php artisan generate:helpers
```

This will create a folder named `Helpers` within `App/`, where you will find suggested standard classes for creating your own helpers.

The structure of the `Helpers` folder will be similar to the following:

```css
app/
└── Helpers/
    └── General.php
    └── Strings.php
    └── Arrays.php
    //...
```

Each class represents a category of helpers. The classes will not contain methods; you will define the methods your application requires.

You can organize your helpers into different categories by creating dedicated classes for each category. For example, if you want to create functions related to string manipulation, you can use the `Strings` class.

## Calling Helpers
To call the helpers from anywhere in your application, use the following syntax:

- Controllers or Classes:
  ```php
  use Helper;
  
  Helper::categoryMethodName();
  ```

- Views or Components:
  ```php
  {{ Helper::categoryMethodName() }}
  ```

You can also import and directly use the class of the required category by utilizing the `instance()` method. For example:

```php
use App\Helpers\Strings;

Strings::instance()->methodName();
```

## Creating a New Category
If you want to create a new category of helpers, execute the following command:

```shell
php artisan create:helper CategoryName
```

Replace `CategoryName` with the desired name for the new category.

## Creator
- 🇨🇴 Raúl Mauricio Uñate Castro
- Email: raulmauriciounate@gmail.com

## License
This project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).