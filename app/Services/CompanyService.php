<?php

namespace App\Services;
use App\Contracts\CompanyRepositoryInterface;
use App\Contracts\CompanyServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class CompanyService implements CompanyServiceInterface{
    public function __construct(
    private readonly CompanyRepositoryInterface $CompanyRepository){}

    public function getCompanies(int $limit = 5): Collection
    {
        return $this->CompanyRepository->all()->take( $limit);
    }
}