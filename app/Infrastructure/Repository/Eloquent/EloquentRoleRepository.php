<?php

namespace App\Infrastructure\Repository\Eloquent;

use App\Domain\Repository\RoleRepository;
use App\Models\Role;

class EloquentRoleRepository implements RoleRepository
{
    public function __construct(
        private Role $model,
    ) { 
    }

    public function all(): array
    {
        return $this->model::all()->toArray();
    }
}