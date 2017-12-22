<?php

namespace MWI\LaravelKit;

use App\Observers\UserObserver;
use App\User;
use Form;
use Illuminate\Support\ServiceProvider;

class LaravelKitServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publish();

        $this->registerHelpers();

        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\Install::class
            ]);
        }
    }

    /**
     * Publish Starter Kit Directories
     * @return void
     */
    public function publish()
    {
        $this->publishes([
            __DIR__.'/database/' => database_path(),
        ], 'database');

        $this->publishes([
            __DIR__.'/phpcs.xml' => base_path('phpcs.xml'),
            __DIR__.'/.editorconfig' => base_path('.editorconfig'),
        ], 'base');
    }

    /**
     * Register Helpers
     */
    public function registerHelpers()
    {
        if (file_exists($file = __DIR__ . '/Helpers.php'))
        {
            require $file;
        }
    }
}
