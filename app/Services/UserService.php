<?php

namespace App\Services;
use App\Contracts\UserRepositoryInterface;
use App\Contracts\UserServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceInterface{

    public function __construct(
    private readonly UserRepositoryInterface $UserRepository){}

    public function getRecentUsersTry( int $limit = 5): Collection
    {
        $users = $this-> UserRepository -> all();
        $count = $users->count();
        
        for ($i=$count -1; $i > $count - ($limit+1) ; $i--) { 
            $lastusers = $users[$i];
        }
        return $lastusers;
    }

    public function getRecentUsers(int $limit = 5): Collection
    {
        return $this->UserRepository->all()->take(-$limit);
    }

    public function find(int $id)  
    {
        return $this->UserRepository->find($id);
    }
    
}

