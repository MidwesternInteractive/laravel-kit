<?php

namespace MWI\LaravelKit;

use Illuminate\Support\ServiceProvider;

class MWIServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/app/' => app_path(),
        ], 'app');

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
}
