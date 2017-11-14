<?php

namespace MWI\LaravelKit\Commands;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'mwi:install';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'One Command to Rule Them All... okay it installs MWI requirements.';

    /**
     * Method to run on command
     * @return void
     */
    public function handle()
    {
        file_put_contents(base_path('.gitignore'), "/public\n*.DS_Store\n", FILE_APPEND);

        $this->runArtisanCalls();

        $this->comment('MWI Laravel Kit Installed.');
    }

    /**
     * Run Artisan Commands
     * @return void
     */
    public function runArtisanCalls()
    {
        // Create Auth Structure
        $this->call('make:auth');

        // Publish Service Providers
        $this->call('vendor:publish', ['--provider' => 'MWI\LaravelKit\LaravelKitServiceProvider']);
        $this->call('vendor:publish', ['--provider' => 'Spatie\Permission\PermissionServiceProvider']);

        // Migrate and Seed
        $this->call('migrate');
    }
}
