<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function createUser(array $orderDetails);
    public function updateUser(array $orderDetails,$userId);
    public function deleteUser($userId);
}
