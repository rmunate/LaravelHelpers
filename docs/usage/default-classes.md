---
title: Default Classes
---

# Default Classes

```shell
php artisan helper:init
```

For a standard Laravel application, this creates:

```text
app/
└── Helpers/
    ├── Arr.php
    ├── Date.php
    ├── File.php
    ├── Number.php
    └── Str.php
```

If your app uses a different application directory or namespace, the generator uses that configuration. You own these files: running `helper:init` again skips files that already exist.

## Call Laravel methods

Import the helpers from your app's namespace. These classes do not replace Laravel support classes or facades elsewhere in your application.

```php
use App\Helpers\Arr;
use App\Helpers\Date;
use App\Helpers\File;
use App\Helpers\Number;
use App\Helpers\Str;

$settings = [];
Arr::set($settings, 'display.theme', 'dark'); // Updates $settings in place
$date = Date::parse('2026-03-17', 'UTC');
$exists = File::exists(app_path('Helpers/Str.php'));
$formatted = Number::format(1234.5, 2, locale: 'en_US'); // Requires intl
$slug = Str::slug('Laravel Helpers');
```

Available native methods and macros depend on your version of Laravel. `Arr::push()`, for example, requires a Laravel version that provides it. `Date` and `File` use Laravel's facades and require a bootstrapped application.

## Add your own methods

Add your method inside the generated class and keep its trait to continue using Laravel methods. For example, add this method to `Str.php`:

```php
public static function zfill(string $input, int $width): string
{
    return str_pad($input, $width, '0', STR_PAD_LEFT);
}
```

You can then call `Str::zfill('42', 5)` to get `'00042'`. The package also provides [string character checks](/methods/strings).
