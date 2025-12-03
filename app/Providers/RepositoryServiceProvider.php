<?php

namespace App\Providers;

use App\database\Repositories\UserRepository;
use App\Contracts\UserRepositoryInterface;
use App\Contracts\UserServiceInterface;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    protected array $repositorys = [
        UserRepositoryInterface::class => UserRepository::class
    ];

    protected array $services = [
        UserServiceInterface::class => UserService::class
    ];

    public function register(): void{
        foreach ($this->repositorys as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }

         foreach ($this->services as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }


}


