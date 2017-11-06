<?php

namespace MWI\LaravelKit\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
    protected $description = 'Command to install MWI requirements.';

    /**
     * Method to run on command
     * @return void
     */
    public function handle()
    {
        file_put_contents(base_path('.gitignore'), "/public/css\n/public/js\n", FILE_APPEND);

        $this->runArtisanCalls();

        // Create Super User
        $user = User::create([
            'name'      => 'mwi',
            'email'     => 'support@buildmidwestern.com',
            'password'  => Hash::make('123mwi'),
        ]);

        $this->comment('MWI Laravel Kit Installed.');
    }

    /**
     * Run Artisan Commands
     * @return void
     */
    public function runArtisanCalls()
    {
        // Create Auth structure
        $this->call('make:auth');

        // Publish Service Providers
        $this->call('vendor:publish', ['--provider' => 'MWI\LaravelKit\LaravelKitServiceProvider']);
        $this->call('vendor:publish', ['--provider' => 'Spatie\Permission\PermissionServiceProvider']);

        // Create base Auth and Migrate
        $this->call('migrate');
    }
}