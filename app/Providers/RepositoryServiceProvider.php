<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Contracts\UserRepositoryInterface;
use App\Contracts\UserServiceInterface;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    protected array $repositories = [
        UserRepositoryInterface::class => UserRepository::class
    ];

    protected array $services = [
        UserServiceInterface::class => UserService::class
    ];

    public function register(): void{
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }

        foreach ($this->services as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }


}


