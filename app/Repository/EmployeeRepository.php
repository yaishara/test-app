<?php

namespace App\Repository;

use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Image\Image;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getAllEmployee()
    {
        return Employee::with('company')->get();
    }

    /**
     * @throws \Exception
     */
    public function createEmployee($employeeData)
    {
        DB::beginTransaction();
        try {

            $employee = new Employee();
            $employee->first_name = $employeeData->first_name;
            $employee->last_name = $employeeData->last_name;
            $employee->email = $employeeData->email;
            $employee->company_id = $employeeData->company_id;
            $employee->phone = $employeeData->phone;
            $employee->save();

            $image = $employeeData->file('image_path');
            if ($image) {
                $employee->addMedia($image)->toMediaCollection();
            }

            DB::commit();
            return $employee;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }

    }

    public function updateEmployee($employeeData, $employee)
    {
        DB::beginTransaction();
        try {
            $image = $employeeData->file('image_path');

            $employee->first_name = $employeeData->first_name;
            $employee->last_name = $employeeData->last_name;
            $employee->email = $employeeData->email;
            $employee->company_id = $employeeData->company_id;
            $employee->phone = $employeeData->phone;
            $employee->save();

            if ($image) {
                if ($employeeData->hasFile('image_path')) {
                    $employee->clearMediaCollection('image_path');
                    $employee->addMediaFromRequest('image_path')->toMediaCollection('image_path');
                }
            }
            DB::commit();
            return $employee;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }
    }

    public function deleteEmployee($permission)
    {
        return $permission->delete();
    }
}
