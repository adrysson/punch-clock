<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Repository\RoleRepository;
use App\Models\Role;

class EloquentRoleRepository implements RoleRepository
{
    public function all(): array
    {
        return Role::all()->toArray();
    }
}