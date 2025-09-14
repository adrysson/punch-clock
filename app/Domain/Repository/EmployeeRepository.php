<?php

namespace App\Domain\Repository;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface EmployeeRepository
{
    public function paginate(): LengthAwarePaginator;

    public function create(array $data): void;

    public function update(User $employee, array $data): void;

    public function delete(User $employee): void;
}