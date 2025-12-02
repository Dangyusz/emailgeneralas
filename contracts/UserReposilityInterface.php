<?php 

namespace App\contracts;

use app\Models\User;


interface UserReposilityInterface extends BaseRepositoryInterface
{
    public function finduser(int $id ): User;
}