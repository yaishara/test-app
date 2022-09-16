<?php

namespace App\Http\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;

class CompanyAPIController extends Controller
{
    private $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        return $this->companyRepository->getAllCompanies();
    }

    public function store(CompanyRequest $request)
    {
        $company = null;
        try {
            $company = $this->companyRepository->createCompany($request);
            $message = 'Company added Successfully';
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        return response()->json([
            'data' => $company,
            'message' => $message
        ]);

    }

    public function update(CompanyRequest $request, Company $company)
    {
        try {
            $this->companyRepository->updateCompany($request, $company);
            $message = 'Company update Successfully';
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        return response()->json([
            'data' => $company,
            'message' => $message
        ]);
    }


    public function destroy(Company $company)
    {
        try {
            $this->companyRepository->deleteCompany($company);
            $message = 'Company Delete Successfully';
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        return response()->json([
            'data' => [],
            'message' => $message
        ]);
    }
}
