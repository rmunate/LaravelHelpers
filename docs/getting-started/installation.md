---
title: Installation
---

# Installation

Install Laravel Helpers 4.x from an existing Laravel application:

```shell
composer require "rmunate/laravel_helpers:^4.0"
```

The package supports [Laravel 12 and 13](/getting-started/versions). Laravel 13 requires PHP 8.3 or newer. The `ctype` and `tokenizer` extensions are required; enable `intl` if you use locale-aware number methods such as `Number::format()`.

Laravel's package discovery registers `Helpers\Illuminate\Support\Providers\HelpersServiceProvider` automatically. If you have disabled package discovery for this package, add the provider to your application's `bootstrap/providers.php`.

Verify installation and generate the default classes:

```shell
php artisan list helper
php artisan helper:init
```

If you're upgrading an existing application, see the [4.0 migration notes](/getting-started/changelog#upgrade-from-3-x).
