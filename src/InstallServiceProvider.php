<?php

namespace MWI\LaravelKit;

use Illuminate\Support\ServiceProvider;
use MWI\LaravelKit\Install;

class InstallServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/app/' => app_path(),
        ]);
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
