<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Contracts\UserRepositoryInterface;
use App\Contracts\UserServiceInterface;
use App\Services\UserService;
use App\Repositories\CompanyRepository;
use App\Contracts\CompanyRepositoryInterface;
use App\Contracts\CompanyServiceInterface;
use App\Services\CompanyService;
use Illuminate\Support\ServiceProvider;
use App\Services\JobService;
use App\Contracts\JobServiceInterface;
use App\Repositories\JobRepository;
use App\Contracts\JobRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{

    protected array $repositories = [
        UserRepositoryInterface::class => UserRepository::class,
        CompanyRepositoryInterface::class => CompanyRepository::class,
        JobRepositoryInterface::class => JobRepository::class
    ];

    protected array $services = [
        UserServiceInterface::class => UserService::class,
        CompanyServiceInterface::class => CompanyService::class, 
        JobServiceInterface::class => JobService::class
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


