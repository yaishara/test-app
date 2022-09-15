<?php

namespace App\Repository;

use App\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function getAllPermission()
    {
        return Permission::with('group')->paginate(10);
    }

    /**
     * @throws \Exception
     */
    public function createPermission($permissionData)
    {
        DB::beginTransaction();
        try {
            $permission = new Permission();
            $permission->name = $permissionData->name;
            $permission->guard_name = $permissionData->guard_name;
            $permission->permission_group_id = $permissionData->permission_group;
            $permission->save();

            DB::commit();
            return $permission;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }

    }

    public function updatePermission($permissionData, $permission)
    {
        DB::beginTransaction();
        try {
            $permission->name = $permissionData->name;
            $permission->guard_name = $permissionData->guard_name;
            $permission->permission_group_id = $permissionData->permission_group;
            $permission->save();

            DB::commit();
            return $permission;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }
    }

    public function deletePermission($permission)
    {
        return $permission->delete();
    }
}
