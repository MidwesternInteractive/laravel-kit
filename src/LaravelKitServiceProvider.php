<?php

namespace MWI\LaravelKit;

use Illuminate\Support\ServiceProvider;

class LaravelKitServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publish();

        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\Install::class,
            ]);
        }
    }

    public function register()
    {
        //
    }

    public function provides()
    {
        //
    }

    /**
     * Publish Starter Kit Directories
     * @return void
     */
    public function publish()
    {
        $this->publishes([
            __DIR__.'/app/' => app_path(),
        ], 'app');

        $this->publishes([
            __DIR__.'/database/' => database_path(),
        ], 'database');
    }
}
