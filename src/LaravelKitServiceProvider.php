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

        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\Install::class,
            ]);
        }

        User::observe(UserObserver::class);

        /**
         * Initiate Form Componenets
         */
        Form::component('mwitext', 'components.text', ['name', 'value' => null, 'attributes' => []]);
        Form::component('mwipass', 'components.pass', ['name', 'attributes' => []]);
        Form::component('mwiemail', 'components.email', ['name', 'value' => null, 'attributes' => []]);
        Form::component('mwiselect', 'components.select', ['name', 'options' => [], 'value' => null, 'attributes' => []]);
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

        $this->publishes([
            __DIR__.'/phpcs.xml' => base_path('phpcs.xml'),
        ], 'base');

        $this->publishes([
            __DIR__.'/resources/' => resource_path(),
        ], 'resources');
    }
}
