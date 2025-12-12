<?php 

namespace App\Contracts;

use App\Models\Company;


interface CompanyRepositoryInterface extends BaseRepositoryInterface
{
    public function FindByName($data): Company;


}