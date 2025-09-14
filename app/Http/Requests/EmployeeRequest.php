<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', $this->uniqueEmailRule()],
            'password' => [$this->sendPassword(), 'string', 'confirmed', Password::defaults()],
            'document' => ['required', 'string', 'max:14', $this->uniqueDocumentRule()],
            'birth_date' => ['required', 'date', 'before:today'],
            'address' => ['required', 'array'],
            'address.zip_code' => ['required', 'string', 'max:20'],
            'address.state' => ['required', 'string', 'max:2'],
            'address.city' => ['required', 'string', 'max:255'],
            'address.neighborhood' => ['nullable', 'string', 'max:255'],
            'address.street' => ['nullable', 'string', 'max:255'],
            'address.number' => ['nullable', 'integer'],
            'address.complement' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function dataToSave(): array
    {
        $data = $this->all();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        if (! empty($data['password'])) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
        }

        return $data;
    }

    protected function sendPassword(): string
    {
        return 'required';
    }

    protected function uniqueEmailRule(): string
    {
        return 'unique:users,email';
    }

    protected function uniqueDocumentRule(): string
    {
        return 'unique:users,document';
    }
}
