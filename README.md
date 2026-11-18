# Laravel Helpers

Generate helper classes and global functions inside your Laravel app. The generated `Arr`, `Date`, `File`, `Number`, and `Str` classes forward calls to Laravel, so you can add your own methods without modifying the framework.

## Install 4.0

| Laravel | PHP versions supported by Laravel |
| --- | --- |
| **13.x** | **8.3–8.5** |
| 12.x | 8.2–8.5 |

Install on a supported Laravel application:

```shell
composer require "rmunate/laravel_helpers:^4.0"
```

Laravel discovers the package automatically. The `intl` extension is needed for localized number formatting.

## Quick start

```shell
php artisan helper:init         # Generate Arr, Date, File, Number, and Str
php artisan helper:create Html  # Generate a custom class
php artisan helper:functions    # Create an optional global functions file
```

In a standard Laravel app, files are created in `app/Helpers`. Running `helper:init` again fills in missing files without replacing your changes.

```php
use App\Helpers\Str;

Str::slug('Laravel Helpers'); // 'laravel-helpers'
Str::isDigit('42');           // true
```

See the [full documentation](https://rmunate.github.io/LaravelHelpers/), [4.0 release and migration notes](docs/getting-started/changelog.md), and [contributor guide](docs/contribute/contribution.md).

## License

[MIT](LICENSE.md) · [Sponsor the project](https://github.com/sponsors/rmunate)
