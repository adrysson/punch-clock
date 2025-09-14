<div>
    @include('partials.time-clock-heading')

    <div class="flex flex-col items-center">
        <flux:button variant="primary" wire:click="punch">
            {{ __('Registrar ponto') }}
        </flux:button>
        @include('components.employees.time-clock', ['timeClocks' => $timeClocks])
    </div>
</div>
