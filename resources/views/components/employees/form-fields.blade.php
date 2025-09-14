<!-- Name -->
<flux:input
    wire:model="name"
    :label="__('Nome')"
    type="text"
    required
    autofocus
    autocomplete="name"
    :placeholder="__('Nome completo')"
    :value="$employee?->name ?? ''"
/>

<!-- Email Address -->
<flux:input
    wire:model="email"
    :label="__('Email')"
    type="email"
    required
    autocomplete="email"
    placeholder="email@example.com"
    :value="$employee?->email ?? ''"
/>

<flux:select
    :label="__('Cargo')"
    wire:model="role_id"
    :placeholder="__('Selecione a função')"
    required
>
    @foreach($roles as $role)
        <flux:select.option :selected="$employee?->role_id == $role['id']" value="{{ $role['id'] }}">{{ $role['name'] }}</flux:select.option>
    @endforeach
</flux:select>

<!-- Document -->
<flux:input
    wire:model="document"
    :label="__('CPF')"
    type="text"
    required
    autocomplete="document"
    :placeholder="__('000.000.000-00')"
    mask="000.000.000-00"
    maxlength="14"
    :value="$employee?->document ?? ''"
/>

<!-- Birth Date -->
<flux:input
    wire:model="birth_date"
    :label="__('Data de nascimento')"
    type="date"
    required
    autocomplete="birth_date"
    :placeholder="__('Data de nascimento')"
    :value="$employee?->birth_date->format('Y-m-d') ?? ''"
/>

<!-- Address Fields -->
<livewire:address-form :address="$employee?->address" />

<!-- Password -->
<flux:input
    wire:model="password"
    :label="__('Senha')"
    type="password"
    :required="$employee ? false : true"
    autocomplete="new-password"
    :placeholder="__('Senha')"
    viewable
/>

<!-- Confirm Password -->
<flux:input
    wire:model="password_confirmation"
    :label="__('Confirmar senha')"
    type="password"
    :required="$employee ? false : true"
    autocomplete="new-password"
    :placeholder="__('Confirmar senha')"
    viewable
/>