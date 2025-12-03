<?php 

namespace App\Contracts;

use app\Models\User;


interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function FindByEmail($data): User;


}
