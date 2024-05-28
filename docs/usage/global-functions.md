---
title: Global Functions
editLink: true
outline: deep
---

# Global Functions

If you're a fan of functional programming and prefer to define some globally accessible functions in your application, you can create a file to host your different functions, which will be available project-wide by default.

To create the file where you'll define the functions, simply run the command:

```shell
php artisan helpers:functions
```

## Helpers File

The above command will create a file named `Functions` within the `Helpers` folder in your Laravel project's `app` directory:

```shell
app/
└── Helpers/
    └── Functions.php
    //...
```

## Defining Global Functions

With this file in your project, you can start defining global variables as shown in the following example. We'll simply create a function that returns the currently logged-in user.

```php
if (! function_exists('current_user')) {
    function current_user()
    {
        return auth()->user();
    }
}
```

Notice how before defining the function, we've used `function_exists`, which ensures that if a function with this name doesn't already exist, this new one will be created.

Now, to call this function from anywhere in your project, whether in Blade views or in classes, controllers, models, etc., you simply use the function directly:

```php
$user = current_user();
```

You don't need to modify the `composer.json` file as various tutorials on the internet suggest; this file comes preloaded.