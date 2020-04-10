<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessDashboardPermission = Permission::create(['name' => 'access-dashboard']);

        $usersListPermission = Permission::create(['name' => 'users.list']);
        $usersReadPermission = Permission::create(['name' => 'users.read']);
        $usersCreatePermission = Permission::create(['name' => 'users.create']);
        $usersEditPermission = Permission::create(['name' => 'users.edit']);
        $usersDeletePermission = Permission::create(['name' => 'users.delete']);

        $casesListPermission = Permission::create(['name' => 'cases.list']);
        $casesReadPermission = Permission::create(['name' => 'cases.read']);
        $casesCreatePermission = Permission::create(['name' => 'cases.create']);
        $casesEditPermission = Permission::create(['name' => 'cases.edit']);
        $casesDeletePermission = Permission::create(['name' => 'cases.delete']);

        // Administrator
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo(['access-dashboard']);
        $role->givePermissionTo(['users.list', 'users.read', 'users.create', 'users.edit', 'users.delete']);
        $role->givePermissionTo(['cases.list', 'cases.read', 'cases.create', 'cases.edit', 'cases.delete']);

        $role = Role::create(['name' => 'dinkes-provinsi-operator']);
        $role->givePermissionTo(['access-dashboard']);
        $role->givePermissionTo(['users.list', 'users.read', 'users.create', 'users.edit', 'users.delete']);
        $role->givePermissionTo(['cases.list', 'cases.read']);

        $role = Role::create(['name' => 'dinkes-kabkota-operator']);
        $role->givePermissionTo(['access-dashboard']);
        $role->givePermissionTo(['cases.list', 'cases.read', 'cases.create', 'cases.edit', 'cases.delete']);
    }
}
