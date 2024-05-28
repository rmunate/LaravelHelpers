---
title: Custom Classes
editLink: true
outline: deep
---

# Custom Classes

If your project's needs go beyond the categories of standard classes, you can create your own solutions.

With a simple command, you can create your own static helper classes.

```shell
php artisan helper:create Html
```
In this case, `Html` is the name of the Helpers category, but you can use any name you prefer. Just make sure it follows PascalCase.

The above command will create a new class within the `Helpers` folder with the name you specified.

```shell
app/
└── Helpers/
    └── Html.php
    //...
```

## Defining Static Methods

For this example, let's create a method in the `Html` class that handles rendering a text input.

```php
class Html extends BaseHelpers
{

    /**
     * Render a text input field.
     *
     * @param string $name The name attribute of the input field.
     * @param string $value The value attribute of the input field (default is an empty string).
     * @return string The rendered HTML for the input field.
     */
    public static function textInput(string $name, string $value = ''): string
    {
        return '<input type="text" name="' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') .
               '" value="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '">';
    }

}
```

Now you can use your helper wherever you need it.

## Example Usage of Helper in Blade

If you want to execute your helper within Blade, you can do so with the following syntax.

```blade
{!! \App\Helpers\Html::textInput('username', 'rmunate') !!}
```

## Usage in Classes

If, on the other hand, you'll be using it in controllers, services, or specific classes in your application, you can simply import the class and make the corresponding call.

```php
use App\Helpers\Html;

$input = Html::textInput('username', 'rmunate');
```