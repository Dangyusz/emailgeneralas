<?php

namespace App\Repositories;

use App\Contracts\CompanyRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Company;

class CompanyRepository extends BaseRepository implements CompanyRepositoryInterface
{
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function FindByName($data): Company
    {
         return $this->model->where('name', $data)->firstOrFail();
    }
}