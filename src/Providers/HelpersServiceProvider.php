<?php

namespace Helpers\Illuminate\Support\Providers;

use Helpers\Illuminate\Support\Commands\CreateHelpers;
use Helpers\Illuminate\Support\Commands\CreateHelpersFunctions;
use Helpers\Illuminate\Support\Commands\GenerateHelpers;
use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $functions = $this->app->path('Helpers/Functions.php');

        if (is_file($functions)) {
            require_once $functions;
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateHelpers::class,
                CreateHelpers::class,
                CreateHelpersFunctions::class,
            ]);
        }
    }
}
