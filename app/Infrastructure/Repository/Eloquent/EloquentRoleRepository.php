<?php

namespace App\Infrastructure\Repository\Eloquent;

use App\Domain\Repository\RoleRepository;
use App\Models\Role;

class EloquentRoleRepository implements RoleRepository
{
    public function all(): array
    {
        return Role::all()->toArray();
    }
}