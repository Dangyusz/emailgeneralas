<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function FindByEmail($data): User
    {
        return $this->model->where('email', $data)->firstOrFail();
    }
}