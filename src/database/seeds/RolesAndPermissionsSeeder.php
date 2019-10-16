<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    private $roles = [
        'super admin',
        'administrator',
        'user',
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
        'user' => [
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
        $this->clearTables();

        foreach ($this->roles as $role) {
            Role::updateOrCreate(['name' => $role]);
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

        app()['cache']->forget('spatie.permission.cache');
    }

    /**
     * Clears the current tables of their data
     */
    public function clearTables()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table(config('permission.table_names.model_has_permissions'))->truncate();
        DB::table(config('permission.table_names.role_has_permissions'))->truncate();
        DB::table(config('permission.table_names.permissions'))->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
