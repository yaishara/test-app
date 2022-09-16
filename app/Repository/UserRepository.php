<?php

namespace App\Repository;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use function GuzzleHttp\Promise\all;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @throws \Exception
     */
    public function getAllUsers()
    {
        return User::with('roles');
    }

    public function createUser($userData)
    {
        $role = $userData->role;
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $userData->name;
            $user->email = $userData->email;
            $user->password = Hash::make($userData->password);

            if ($userData->file()) {
                $fileName = "CAT_" . rand(11111, 99999) . '.' . $userData->file('image_path')->getClientOriginalExtension();
                $filePath = $userData->file('image_path')->storeAs('uploads/users', $fileName, 'public');
                $user->image_path = $fileName;
            }
            $user->save();
            $user->assignRole($role);
            DB::commit();

            return $user;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }

    }

    /**
     * @throws \Exception
     */
    public function updateUser($userData, $userId)
    {
        $role = $userData->role;
        DB::beginTransaction();
        try {
            $user = User::find($userId);
            $user->name = $userData->name;
            $user->email = $userData->email;

            if ($userData->file()) {
                $fileName = "CAT_" . rand(11111, 99999) . '.' . $userData->file('image_path')->getClientOriginalExtension();
                $filePath = $userData->file('image_path')->storeAs('uploads/users', $fileName, 'public');
                $user->image_path = $fileName;
            }
            $user->save();
            $user->syncRoles($role);

            DB::commit();
            return $user;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }
    }

    public function deleteUser($userId)
    {
        return User::find($userId)->delete();
    }
}
