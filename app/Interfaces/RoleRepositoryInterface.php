<?php

namespace App\Interfaces;

interface RoleRepositoryInterface
{
    public function getAllRole();
    public function createRole(array $roleDetails);
    public function updateRole(array $roleDetails,$userId);
    public function deleteRole($role);
}
