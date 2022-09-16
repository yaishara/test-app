<?php

namespace App\Repository;

use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;


class RoleRepository implements RoleRepositoryInterface
{
    /**
     * @throws \Exception
     */
    public function getAllRole(){
        return Role::paginate(10);
    }

    /**
     * @throws \Exception
     */
    public function createRole($roleData)
    {
        DB::beginTransaction();

        try {
            $role = new Role();
            $role->name = $roleData->name;
            $role->guard_name = 'web';
            $role->save();

            $role->givePermissionTo($roleData->permission);

            DB::commit();
            return $role;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }
    }

    /**
     * @throws \Exception
     */
    public function updateRole($roleData, $role)
    {
        DB::beginTransaction();
        try {
            $role->name = $roleData->name;
            $role->save();

            $role->syncPermissions($roleData->permission);

            DB::commit();
            return $role;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }
    }

    public function deleteRole($role)
    {
        return $role->delete();
    }
}
