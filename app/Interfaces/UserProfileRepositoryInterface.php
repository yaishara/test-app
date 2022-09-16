<?php

namespace App\Interfaces;

interface UserProfileRepositoryInterface
{
    public function userByTd($userId);
    public function updateUser(array $orderDetails,$userId);
    public function updatePassword(array $orderDetails,$userId);
}
