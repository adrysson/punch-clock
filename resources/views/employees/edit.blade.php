<x-employees.layout :heading="__('Editar')" :subheading="__('Editar funcionário')">
    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form method="POST" action="{{ route('employees.update', $employee->id) }}" class="flex flex-col gap-6">
        @method('PUT')
        @csrf
        
        @include('components.employees.form-fields', ['roles' => $roles, 'employee' => $employee])

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full" data-test="register-user-button">
                {{ __('Editar conta') }}
            </flux:button>
        </div>
    </form>
</x-employees.layout>
