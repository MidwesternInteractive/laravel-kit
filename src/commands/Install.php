<?php

namespace MWI\LaravelKit\Commands;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mwi:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates the audit report for all stores.';

    /**
     * List of direcotries to create
     * @var array
     */
    static $directories = [
        'app/Traits',
        'app/Services',
        'app/Http/Requests',
        'app/Facades'
    ];

    /**
     * Method to run on command
     * @return [type] [description]
     */
    public function handle()
    {
        foreach (self::$directories as $directory) {
            mkdir($directory, 0777, true);
        }
    }
}