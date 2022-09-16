<?php

namespace App\Interfaces;

interface CompanyRepositoryInterface
{
    public function getAllCompanies();
    public function createCompany(array $companyDetails);
    public function updateCompany(array $companyDetails,$userId);
    public function deleteCompany($company);
}
