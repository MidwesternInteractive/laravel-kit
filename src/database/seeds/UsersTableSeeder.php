<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        // Create Super User
        $super = User::create([
            'email'             => env('SUPER_ADMIN_EMAIL', 'super@buildmidwestern.com'),
            'name'              => 'MWI',
            'password'          => Hash::make('123mwi'),
            'remember_token'    => str_random(10)
        ])->syncRoles(['super admin']);

        // Create additional seed data if not in live environment
        if (! App::environment('production')) {
            factory(User::class, 48)->create();
        }
    }
}
