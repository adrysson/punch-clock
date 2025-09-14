<?php

namespace App\Http\Requests;

class UpdateEmployeeRequest extends EmployeeRequest
{
    protected function sendPassword(): string
    {
        return 'nullable';
    }

    protected function uniqueEmailRule(): string
    {
        $employeeId = $this->route('employee')->id;

        return "unique:users,email,{$employeeId}";
    }
}
