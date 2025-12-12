<?php 

namespace App\contracts;

use Illuminate\Database\Eloquent\Collection;


interface UserServiceInterface
{
    public function getRecentUsers( int $limit = 5): Collection;

    public function find(int $id);
}

