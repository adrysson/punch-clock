<x-employees.layout :heading="__('Editar')" :subheading="__('Editar funcionário')">
    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form method="POST" action="{{ route('employees.update', $employee->id) }}" class="flex flex-col gap-6">
        @method('PUT')
        @csrf
        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('Nome')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Nome completo')"
            :value="$employee->name"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
            :value="$employee->email"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Senha')"
            type="password"
            autocomplete="new-password"
            :placeholder="__('Senha')"
            viewable
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirmar senha')"
            type="password"
            required-if="password"
            autocomplete="new-password"
            :placeholder="__('Confirmar senha')"
            viewable
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full" data-test="register-user-button">
                {{ __('Editar conta') }}
            </flux:button>
        </div>
    </form>
</x-employees.layout>
