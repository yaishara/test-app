<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataTables\EmployeeDataTable;
use App\Http\Requests\EmployeeRequest;
use App\Interfaces\CompanyRepositoryInterface;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private EmployeeRepositoryInterface $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository, CompanyRepositoryInterface $companyRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->companyRepository = $companyRepository;

        $this->middleware('permission:employee-list', ['only' => ['index']]);
        $this->middleware('permission:employee-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:employee-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:employee-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeDataTable $dataTable)
    {
        $company = $this->companyRepository->getAllCompanies()->pluck('name', 'id');
        $employees = $this->employeeRepository->getAllEmployee();
        return $dataTable->render('backend.employee.index', compact('employees', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */
    public function store(EmployeeRequest $request, EmployeeRepositoryInterface $employeeRepository)
    {
        try {
            $this->employeeRepository->createEmployee($request);
            $message = ['success' => 'Employee added Successfully'];
        } catch (Exception $exception) {
            $message = ['error' => 'Pls try again..!'];
        }
        return redirect(route('employee.index'))->with($message);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Employee $employee
     * @return
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        try {
            $this->employeeRepository->updateEmployee($request, $employee);
            $message = ['success' => 'Employee update Successfully'];
        } catch (\Exception $exception) {
            $message = ['error' => 'Pls try again..!'];
        }
        return redirect(route('employee.index'))->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response|string
     */
    public function destroy(Employee $employee)
    {
        $this->employeeRepository->deleteEmployee($employee);
        return 'true';
    }
}
