---
title: Release Notes
---

# Release Notes

## 4.0.0

- Added Laravel 13 support and retained Laravel 12 compatibility. Dropped Laravel 11 after the end of its upstream security support.
- Fixed calls through the `Date` and `File` wrappers, Laravel macros, and `Arr` methods that mutate their first argument by reference.
- Loaded `Helpers/Functions.php` during Laravel's boot process using the actual application path instead of a fixed path from `vendor`.
- Generated helpers now use the application's namespace. `helper:init` skips existing files; invalid names, duplicate individual requests, and write failures return a nonzero exit code.
- Kept the eleven `Str` character checks in the package trait for newly generated classes, and removed placeholder methods and stale declarations from the templates.
- Added Laravel integration tests, a PHP/Laravel CI matrix, and a GitHub Pages workflow that builds documentation before deploying it.

### Upgrade from 3.x

If your app is still on Laravel 11, [upgrade Laravel](https://laravel.com/docs/12.x/upgrade) to at least 12.x first.

```shell
composer require "rmunate/laravel_helpers:^4.0" --with-all-dependencies
```

- Keep your existing helper classes and `Functions.php`. You do not need to regenerate them to get the fixes for the native Laravel traits. `helper:init` only adds missing files.
- Global functions are now available **after Laravel boots**. If a standalone script needs them before bootstrapping Laravel, explicitly load the file in that script instead.
- Scripts that call `helper:create` or `helper:functions` should handle a nonzero exit code when the target already exists. Use `helper:init` when you need a repeatable default setup.
- If an `Arr` subclass overrides `set`, `forget`, `pull`, or `push`, match the wrapper's by-reference parameter and method signature.

## 3.1.0

- Added Laravel 12 support.

## 3.0.0

- Added the `Number` wrapper for Laravel's native numeric helpers.
- Removed the old dynamic `Helper` class.
