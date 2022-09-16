<?php

namespace App\Interfaces;

interface EmployeeRepositoryInterface
{
    public function getAllEmployee();
    public function createEmployee(array $employeeDetails);
    public function updateEmployee(array $employeeDetails,$userId);
    public function deleteEmployee($employee);
}
