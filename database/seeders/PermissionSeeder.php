<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pg = PermissionGroup::updateOrCreate(['name' => 'Role']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'role-list', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'role-create', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'role-edit', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'role-delete', 'guard_name' => 'web']);

        $pg = PermissionGroup::updateOrCreate(['name' => 'User']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'user-list', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'user-create', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'user-edit', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'user-delete', 'guard_name' => 'web']);

        $pg = PermissionGroup::updateOrCreate(['name' => 'Permission']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'permission-list', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'permission-create', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'permission-edit', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'permission-delete', 'guard_name' => 'web']);

        $pg = PermissionGroup::updateOrCreate(['name' => 'UserProfile']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'userProfile-edit', 'guard_name' => 'web']);

        $pg = PermissionGroup::updateOrCreate(['name' => 'Company']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'company-list', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'company-create', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'company-edit', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'company-delete', 'guard_name' => 'web']);

        $pg = PermissionGroup::updateOrCreate(['name' => 'Employee']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'employee-list', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'employee-create', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'employee-edit', 'guard_name' => 'web']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'employee-delete', 'guard_name' => 'web']);

        $pg = PermissionGroup::updateOrCreate(['name' => 'Dashboard']);
        Permission::updateOrCreate(['permission_group_id' => $pg->id, 'name' => 'dashboard-list', 'guard_name' => 'web']);

    }
}
