<x-layouts.app :title="__('Funcionários')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Gerenciamento de registro de ponto') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Funcionalidades de gerenciamento de registro de ponto') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div class="flex items-start max-md:flex-col">
        <flux:separator class="md:hidden" />

        <div class="flex-1 self-stretch max-md:pt-6">
            <flux:heading>{{ $heading ?? '' }}</flux:heading>
            <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

            <div class="mt-5 w-full">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layouts.app>
