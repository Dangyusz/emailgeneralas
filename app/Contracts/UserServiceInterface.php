<?php

namespace App\Contracts;
use Illuminate\Database\Eloquent\Collection;

use App\Models\User;

interface UserServiceInterface 
{
    public function getRecentUsers( int $limit = 5): Collection;

    public function find(int $id);
}