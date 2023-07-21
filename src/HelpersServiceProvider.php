<?php

namespace Rmunate\LaravelHelpers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register commands for the service provider
        $this->registerCommands();
    }

    /**
     * Register the commands provided by the service provider.
     *
     * @return void
     */
    protected function registerCommands()
    {
        // Register the custom Artisan commands
        $this->commands([
            Commands\GenerateHelpers::class,
            Commands\CreateHelpers::class,
        ]);
    }
}