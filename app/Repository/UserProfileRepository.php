<?php

namespace App\Repository;

use App\Interfaces\UserProfileRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserProfileRepository implements UserProfileRepositoryInterface
{
    public function userByTd($userId)
    {
        return User::find($userId);
    }

    /**
     * @throws \Exception
     */
    public function updateUser($userDetails, $userId)
    {
        $hashedPassword = Auth::user()->password;
        $msgType = null;
        $msg = null;
        DB::beginTransaction();
        try {
            if (Hash::check($userDetails->old_password, $hashedPassword)) {
                if (Hash::check($userDetails->new_password, $hashedPassword)) {
                    $msgType = "error";
                    $msg = "new password can not be the old password!";
                } else {
                    $users = User::find($userId);
                    $users->password = Hash::make($userDetails->new_password);
                    $users->save();
                    $msgType = "success";
                    $msg = "password updated successfully";
                }
            } else {
                $msgType = "error";
                $msg = "old password doesnt matched";
            }
            DB::commit();
            return $users;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }
    }
}
