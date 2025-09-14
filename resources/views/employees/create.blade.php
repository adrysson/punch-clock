<x-employees.layout :heading="__('Cadastrar')" :subheading="__('Cadastrar novo funcionário')">
    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form method="POST" action="{{ route('employees.store') }}" class="flex flex-col gap-6">
        @csrf
        @include('components.employees.form-fields', ['roles' => $roles, 'employee' => null])

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full" data-test="register-user-button">
                {{ __('Criar conta') }}
            </flux:button>
        </div>
    </form>
</x-employees.layout>
