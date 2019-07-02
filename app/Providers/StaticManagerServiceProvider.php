<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StaticManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('staticmanager', function() {
            return new \App\Helpers\StaticManager;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
