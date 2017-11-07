<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Seed Developer Account
        Role::create(['name' => 'developer']);

        $developer = User::create([
            'name'      => 'MWI',
            'email'     => 'support@buildmidwestern.com',
            'password'  => Hash::make('123mwi'),
        ])->assignRole('developer');

        // Seed Administrator Account
        Role::create(['name' => 'administrator']);

        $administrator = User::create([
            'name'      => 'Administrator',
            'email'     => env('ADMIN_EMAIL', 'support@midwesterninteractive.com'),
            'password'  => Hash::make('secret'),
        ])->assignRole('administrator');
        
        // Create additional seed data if not in live environment
        if (!App::environment('production')) {
            factory(App\User::class, 48)->create();
        }
    }
}
