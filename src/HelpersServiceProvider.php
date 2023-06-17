<?php

namespace Rmunate\LaravelHelpers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{

    /*
     * Execute Method registerCommands
     */
    public function boot(){
        $this->registerCommands(); 
    }

    /*
     * Register Commands
     * @return :void
     */
    protected function registerCommands(){
        $this->commands([
            Commands\GenerateHelpers::class,
            Commands\CreateHelpers::class,
        ]);
    }
}

?>