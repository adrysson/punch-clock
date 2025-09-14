<x-layouts.app :title="__('Funcionários')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Gerenciamento de funcionários') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Funcionalidades de gerenciamento de funcionários') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div class="flex items-start max-md:flex-col">
        <div class="me-10 w-full pb-4 md:w-[220px]">
            <flux:navlist>
                <flux:navlist.item :href="route('employees.index')" wire:navigate>{{ __('Lista') }}</flux:navlist.item>
                <flux:navlist.item :href="route('employees.create')" wire:navigate>{{ __('Cadastrar') }}</flux:navlist.item>
            </flux:navlist>
        </div>

        <flux:separator class="md:hidden" />

        <div class="flex-1 self-stretch max-md:pt-6">
            <flux:heading>{{ $heading ?? '' }}</flux:heading>
            <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

            <div class="mt-5 w-full max-w-lg">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layouts.app>
