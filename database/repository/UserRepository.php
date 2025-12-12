<?php

namespace App\database\repository;

use App\Models\User;
use App\contracts\UserRepositoryInterface;
use App\database\repository\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    

    public function findByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }
}