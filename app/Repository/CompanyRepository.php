<?php

namespace App\Repository;

use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function getAllCompanies()
    {
        return Company::all();
    }

    /**
     * @throws \Exception
     */
    public function createCompany($companyData)
    {
        DB::beginTransaction();
        try {
            $logoImage = $companyData->file('logo_image_path');
            $coverImage = $companyData->file('cover_image_path');
            $company = new Company();
            $company->name = $companyData->name;
            $company->email = $companyData->email;
            $company->telephone = $companyData->telephone;
            $company->website = $companyData->website;
            $company->save();

            $company->addMedia($logoImage)->toMediaCollection();
            $company->addMedia($coverImage)->toMediaCollection();
            DB::commit();
            return $company;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }

    }

    public function updateCompany($companyData, $company)
    {
        DB::beginTransaction();
        try {
            $logoImage = $companyData->file('logo_image_path');
            $coverImage = $companyData->file('cover_image_path');

            $company->name = $companyData->name;
            $company->email = $companyData->email;
            $company->telephone = $companyData->telephone;
            $company->website = $companyData->website;
            $company->save();

            if ($logoImage) {
                if ($companyData->hasFile('logo_image_path')) {
                    $company->clearMediaCollection('logo_image_path');
                    $company->addMediaFromRequest('logo_image_path')->toMediaCollection('logo_image_path');
                }
            }
            if ($coverImage) {
                if ($companyData->hasFile('cover_image_path')) {
                    $company->clearMediaCollection('cover_image_path');
                    $company->addMediaFromRequest('cover_image_path')->toMediaCollection('cover_image_path');
                }
            }
            DB::commit();
            return $company;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();
            throw $exception;
        }
    }

    public function deleteCompany($company)
    {
        return $company->delete();
    }
}
