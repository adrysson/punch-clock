<?php

namespace App\Domain\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface EmployeeRepository
{
    public function paginate(): LengthAwarePaginator;

    public function create(array $data): void;

    // public function update($id, array $data);

    // public function delete($id);
}