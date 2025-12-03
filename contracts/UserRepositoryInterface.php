<?php

namespace App\contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

interface  UserRepositoryInterface extends BaseRepositoryInterface
{
    public function findByEmail(string $email): ?User;


}