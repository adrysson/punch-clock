<?php

namespace App\Infrastructure\Repository\Eloquent;

use App\Domain\Repository\EmployeeRepository;
use App\Models\Address;
use App\Models\User;
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

    public function update(User $employee, array $data): void
    {
        $employee->update($data);
        if (isset($data['address'])) {
            $employee->address->update($data['address']);
        }
    }

    public function delete(User $employee): void
    {
        $employee->delete();
    }
}