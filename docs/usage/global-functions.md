---
title: Global Functions
---

# Global Functions

```shell
php artisan helper:functions
```

This creates `app/Helpers/Functions.php` in a standard Laravel project. The command returns a nonzero exit code if the file already exists; edit the existing file instead of regenerating it.

Define your functions in that file without a namespace. Use a project-specific name to avoid collisions, and guard the declaration if another dependency might define it:

```php
<?php

if (! function_exists('shop_current_user')) {
    function shop_current_user()
    {
        return auth()->user();
    }
}
```

After Laravel boots, call `shop_current_user()` from controllers, services, Blade templates, Artisan commands, or jobs.

The provider loads the file once per process from your application's `Helpers` directory. No Composer autoload changes are needed. Restart long-running processes such as queue workers after adding or editing functions.
