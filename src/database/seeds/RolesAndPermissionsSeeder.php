<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    private $roles = [
        'super admin',
        'administrator',
        'member',
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
        ],
        'member' => [
            'view user',
            'update user'
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
            Role::updateOrCreate(['name' => $role]);
        }

        foreach ($this->permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }

        DB::table('role_has_permissions')->truncate();

        foreach ($this->rolesPermissions as $roleName => $permissions) {
            $role = Role::findByName($roleName);

            if ($permissions) {
                foreach ($permissions as $permission) {
                    if (!$role->hasPermissionTo($permission)) {
                        $role->givePermissionTo($permission);
                    }
                }
            }
        }

        app()['cache']->forget('spatie.permission.cache');
    }
}
