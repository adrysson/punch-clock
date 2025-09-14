<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Repository\EmployeeRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentEmployeeRepository implements EmployeeRepository
{
    public function paginate(): LengthAwarePaginator
    {
        return auth()->user()->employees()->paginate();
    }
}