<?php

namespace App\Http\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employee;

class EmployeeAPIController extends Controller
{
    private $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function index()
    {
        return $this->employeeRepository->getAllEmployee();
    }

    public function store(EmployeeRequest $request)
    {
        $employee = null;
        try {
            $employee = $this->employeeRepository->createEmployee($request);
            $message = 'Employee added Successfully';
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        return response()->json([
            'data' => $employee,
            'message' => $message
        ]);

    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        try {
            $this->employeeRepository->updateEmployee($request, $employee);
            $message = 'Employee update Successfully';
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        return response()->json([
            'data' => $employee,
            'message' => $message
        ]);
    }


    public function destroy(Employee $employee)
    {
        try {
            $this->employeeRepository->deleteEmployee($employee);
            $message = 'Employee update Successfully';
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }
        return response()->json([
            'data' => [],
            'message' => $message
        ]);
    }
}

