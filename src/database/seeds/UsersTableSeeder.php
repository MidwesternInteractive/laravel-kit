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
        $role = Role::firstOrCreate(['name' => 'developer']);

        $developer = User::firstOrNew([
            'email'     => 'support@buildmidwestern.com',
            'name'      => 'MWI'
        ]);
        $developer->password = Hash::make('123mwi');
        $developer->remember_token = str_random(10);
        $developer->save();

        $developer->syncRoles(['developer']);

        // Seed Administrator Account
        $role = Role::firstOrCreate(['name' => 'administrator']);

        $administrator = User::firstOrNew([
            'email'     => env('APP_EMAIL', 'support@midwesterninteractive.com'),
            'name'      => 'Administrator'
        ]);
        $administrator->password = Hash::make('secret');
        $administrator->remember_token = str_random(10);
        $administrator->save();

        $administrator->syncRoles(['administrator']);
        
        // Create additional seed data if not in live environment
        if (!App::environment('production')) {
            factory(User::class, 48)->create();
        }
    }
}
