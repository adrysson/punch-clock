<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Repository\EmployeeRepository;
use App\Models\Address;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentEmployeeRepository implements EmployeeRepository
{
    public function paginate(): LengthAwarePaginator
    {
        return auth()->user()->employees()->paginate();
    }

    public function create(array $data): void
    {
        $address = Address::create($data['address']);
        $data['address_id'] = $address->id;

        auth()->user()->employees()->create($data);
    }
}