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
        <flux:select.option :selected="$employee?->role_id == $role->id" value="{{ $role->id }}">{{ $role->name }}</flux:select.option>
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
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <flux:input
        wire:model="address[zip_code]"
        :label="__('CEP')"
        type="text"
        required
        autocomplete="address[zip_code]"
        :placeholder="__('00000-000')"
        mask="00000-000"
        maxlength="9"
        :value="$employee?->address->zip_code ?? ''"
    />
    <flux:input
        wire:model="address[state]"
        :label="__('Estado')"
        type="text"
        required
        autocomplete="address[state]"
        :placeholder="__('Estado')"
        :value="$employee?->address->state ?? ''"
    />
    <flux:input
        wire:model="address[city]"
        :label="__('Cidade')"
        type="text"
        required
        autocomplete="address[city]"
        :placeholder="__('Cidade')"
        :value="$employee?->address->city ?? ''"
    />
    <flux:input
        wire:model="address[neighborhood]"
        :label="__('Bairro')"
        type="text"
        autocomplete="address[neighborhood]"
        :placeholder="__('Bairro')"
        :value="$employee?->address->neighborhood ?? ''"
    />
    <flux:input
        wire:model="address[street]"
        :label="__('Rua')"
        type="text"
        autocomplete="address[street]"
        :placeholder="__('Rua')"
        :value="$employee?->address->street ?? ''"
    />
    <flux:input
        wire:model="address[number]"
        :label="__('Número')"
        type="number"
        autocomplete="address[number]"
        :placeholder="__('Número')"
        :value="$employee?->address->number ?? ''"
    />
    <flux:input
        wire:model="address[complement]"
        :label="__('Complemento')"
        type="text"
        autocomplete="address[complement]"
        :placeholder="__('Complemento')"
        :value="$employee?->address->complement ?? ''"
    />
</div>

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