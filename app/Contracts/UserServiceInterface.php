<?php 

namespace App\contracts;

use Illuminate\Database\Eloquent\Collection;


interface UserServiceInterface
{
    public function getRecentUser(int $limit = 5): collection;
}

