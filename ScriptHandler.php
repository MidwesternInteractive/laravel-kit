<?php

namespace MWI\LaravelKit;

class ScriptHandler
{
    protected $directories = [
        'app/Traits',
        'app/Services',
        'app/Requests',
        'app/Facades'
    ];

    public static function postInstall()
    {
        foreach ($this->directories as $directory) {
            mkdir($directory, 0777, true);
        }
    }
}