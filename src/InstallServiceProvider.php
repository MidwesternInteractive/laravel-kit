<?php

namespace MWI\LaravelKit;

use Illuminate\Support\ServiceProvider;

class InstallServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/app/' => app_path(),
        ], 'app');
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
