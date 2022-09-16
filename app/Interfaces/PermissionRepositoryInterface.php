<?php

namespace App\Interfaces;

interface PermissionRepositoryInterface
{
    public function getAllPermission();
    public function createPermission(array $permissionDetails);
    public function updatePermission(array $permissionDetails,$userId);
    public function deletePermission($permission);
}
