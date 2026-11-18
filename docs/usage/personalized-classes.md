---
title: Custom Classes
---

# Custom Classes

```shell
php artisan helper:create Html
```

This creates `app/Helpers/Html.php` in a standard Laravel project. Use a PascalCase name with only ASCII letters, such as `Html` or `TextTools`. PHP keywords, reserved names such as `Functions`, and existing files are rejected.

Add a public static method inside the generated class:

```php
public static function textInput(string $name, string $value = ''): string
{
    return '<input type="text" name="'.e($name).'" value="'.e($value).'">';
}
```

To use the class in PHP:

```php
use App\Helpers\Html;

$input = Html::textInput('username', 'rmunate');
```

To render the HTML in Blade after escaping the input values:

```blade
{!! \App\Helpers\Html::textInput('username', 'rmunate') !!}
```

If your deployment uses an authoritative Composer class map, rebuild it with `composer dump-autoload --classmap-authoritative` after generating new classes.
