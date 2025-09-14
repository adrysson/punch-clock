<?php

namespace App\Http\Controllers;

use App\Domain\Enum\Role;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Role as ModelsRole;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::where('role_id', Role::EMPLOYEE->value)->paginate();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = ModelsRole::all();

        return view('employees.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $validated = $request->dataToSave();

        $address = \App\Models\Address::create($validated['address']);
        $validated['address_id'] = $address->id;

        $user = auth()->user()->employees()->create($validated);

        event(new \Illuminate\Auth\Events\Registered($user));

        return redirect()->route('employees.index')->with('status', __('Funcionário cadastrado com sucesso!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $employee)
    {
        $roles = ModelsRole::all();

        return view('employees.edit', compact('employee', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, User $employee)
    {
        $validated = $request->dataToSave();

        $employee->update($validated);

        return redirect()->route('employees.index')->with('status', __('Funcionário atualizado com sucesso!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('status', __('Funcionário deletado com sucesso!'));
    }
}
