<?php

namespace Helpers\Illuminate\Support\Providers;

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
        $this->registerCommands();
    }

    /**
     * Register the commands provided by the service provider.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->commands([
            \Helpers\Illuminate\Support\Commands\GenerateHelpers::class,
            \Helpers\Illuminate\Support\Commands\CreateHelpers::class,
            \Helpers\Illuminate\Support\Commands\CreateHelpersFunctions::class,
        ]);
    }
}
