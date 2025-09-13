<x-employees.layout :heading="__('Cadastrar')" :subheading="__('Cadastrar novo funcionário')">
    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form method="POST" action="{{ route('employees.store') }}" class="flex flex-col gap-6">
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
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Senha')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Senha')"
            viewable
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirmar senha')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirmar senha')"
            viewable
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full" data-test="register-user-button">
                {{ __('Criar conta') }}
            </flux:button>
        </div>
    </form>
</x-employees.layout>
