<?php

namespace App\services;
use App\contracts\UserServiceInterface;
use App\contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
class UserService implements UserServiceInterface
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    )
    {}

    public function getRecentUser(int $limit = 5)  : Collection
    {
        $user = $this->userRepository->all()
                 ->sortByDesc('created_at')
                 ->take($limit);

        return $user;
    }
}