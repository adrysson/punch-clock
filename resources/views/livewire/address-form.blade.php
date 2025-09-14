<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- ao atualizar, deve chamar o método searchAddress com o valor do cep atualizado -->
    <flux:input
        wire:model="address[zip_code]"
        :label="__('CEP')"
        type="text"
        required
        autocomplete="address[zip_code]"
        :placeholder="__('00000-000')"
        maxlength="9"
        :value="$address?->zip_code ?? ''"
        wire:change="searchAddress($event.target.value)"
    />
    <flux:input
        wire:model="address[state]"
        :label="__('Estado')"
        type="text"
        required
        autocomplete="address[state]"
        :placeholder="__('Estado')"
        :value="$address['state']?? ''"
    />
    <flux:input
        wire:model="address[city]"
        :label="__('Cidade')"
        type="text"
        required
        autocomplete="address[city]"
        :placeholder="__('Cidade')"
        :value="$address['city'] ?? ''"
    />
    <flux:input
        wire:model="address[neighborhood]"
        :label="__('Bairro')"
        type="text"
        autocomplete="address[neighborhood]"
        :placeholder="__('Bairro')"
        :value="$address['neighborhood'] ?? ''"
    />
    <flux:input
        wire:model="address[street]"
        :label="__('Rua')"
        type="text"
        autocomplete="address[street]"
        :placeholder="__('Rua')"
        :value="$address['street'] ?? ''"
    />
    <flux:input
        wire:model="address[number]"
        :label="__('Número')"
        type="number"
        autocomplete="address[number]"
        :placeholder="__('Número')"
        :value="$address['number'] ?? ''"
    />
    <flux:input
        wire:model="address[complement]"
        :label="__('Complemento')"
        type="text"
        autocomplete="address[complement]"
        :placeholder="__('Complemento')"
        :value="$address['complement'] ?? ''"
    />
</div>