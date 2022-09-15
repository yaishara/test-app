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
        DB::beginTransaction();
        try {
            $image = $userDetails->file('image');
            $users = User::find($userId);
            $users->name = $userDetails->name;
            $users->save();

            //$users->addMedia($image)->toMediaCollection();
            if ($image) {
                if ($userDetails->hasFile('image')) {
                    $users->clearMediaCollection('images');
                    $users->addMediaFromRequest('image')->toMediaCollection('images');
                }
            }
            DB::commit();
            return $users;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }
    }

    public function updatePassword($userDetails, $userId)
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
