<?php

namespace App\Providers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * All of the repository bindings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected array $repositories = [
        UserRepositoryInterface::class => UserRepository::class,
    ];

    /**
     * All of the service bindings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected array $services = [
        UserServiceInterface::class => UserService::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }

        foreach ($this->services as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
