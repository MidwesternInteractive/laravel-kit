<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    private $roles = [
        'super admin',
        'administrator',
        'human resources',
        'service manager',
        'service tech',
        'sales',
        'customer service',
        'customer',
    ];

    private $permissions = [
        'view user',
        'create user',
        'update user',
        'delete user'
    ];

    private $rolesPermissions = [
        'super admin' => [
            'view user',
            'create user',
            'update user',
            'delete user'
        ],
        'administrator' => [
            'view user',
            'create user',
            'update user',
            'delete user'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role) {
            Role::create(['name' => $role]);
        }

        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($this->rolesPermissions as $roleName => $permissions) {
            $role = Role::findByName($roleName);

            if ($permissions) {
                foreach ($permissions as $permission) {
                    $role->givePermissionTo($permission);
                }
            }
        }
    }
}
