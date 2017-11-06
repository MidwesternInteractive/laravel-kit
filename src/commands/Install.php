<?php

namespace MWI\LaravelKit\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Foundation\Console\Artisan;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        file_put_contents(base_path('.gitignore'), "/public/css\n/public/js\n", FILE_APPEND);

        Artisan::call('make:auth');

        // Publish Service Providers
        Artisan::call('vendor:publish --provider="MWI\LaravelKit\LaravelKitServiceProvider"');
        Artisan::call('vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"');

        // Create base Auth and Migrate
        Artisan::call('migrate');

        $user = User::create([
            'name'      => 'mwi',
            'email'     => 'support@buildmidwestern.com',
            'password'  => Hash::make('123mwi'),
        ]);

        // Create Base Role and Assign to user.
        Role::create(['name' => 'super']);
        $user->assignRole('super');

        $this->comment('MWI Laravel Kit Installed.');
    }
}