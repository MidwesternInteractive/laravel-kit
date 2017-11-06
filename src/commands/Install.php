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
    protected $description = 'Command to install MWI requirements.';

    /**
     * Method to run on command
     * @return [type] [description]
     */
    public function handle()
    {
        $this->comment('Command Loaded');
    }
}