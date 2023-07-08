<?php

namespace Rmunate\LaravelHelpers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    /*
     * Execute the registerCommands method.
     */
    public function boot()
    {
        $this->registerCommands();
    }

    /*
     * Register Commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->commands([
            Commands\GenerateHelpers::class,
            Commands\CreateHelpers::class,
        ]);
    }
}
