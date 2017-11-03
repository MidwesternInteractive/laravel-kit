<?php

namespace MWI\LaravelKit;

class ScriptHandler
{
    static $directories = [
        'app/Traits',
        'app/Services',
        'app/Requests',
        'app/Facades'
    ];

    public static function postInstall()
    {
        foreach (self::$directories as $directory) {
            mkdir($directory, 0777, true);
        }
    }
}