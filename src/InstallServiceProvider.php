<?php

namespace MWI\LaravelKit;

use Illuminate\Support\ServiceProvider;

class InstallServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/app/' => base_path('app'),
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
