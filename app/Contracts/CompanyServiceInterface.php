<?php

namespace App\Contracts;
use Illuminate\Database\Eloquent\Collection;

interface CompanyServiceInterface
{
    public function getCompanies(int $limit = 5): Collection;
}