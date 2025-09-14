<?php

namespace App\Providers;

use App\Domain\Enum\Role;
use App\Domain\Repository\EmployeeRepository;
use App\Domain\Repository\RoleRepository;
use App\Infrastructure\Persistence\Repository\EloquentEmployeeRepository;
use App\Infrastructure\Persistence\Repository\EloquentRoleRepository;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            EmployeeRepository::class,
            EloquentEmployeeRepository::class,
        );
        $this->app->bind(
            RoleRepository::class,
            EloquentRoleRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin', function () {
            return auth()->user()?->role_id === Role::MANAGER->value;
        });
    }
}
