<div>
    @include('partials.time-clock-heading')

    <!-- div com metade do tamanho da tela, centralizada, com flex -->
    <div class="flex flex-col items-center">
        <flux:button variant="primary" wire:click="punch">
            {{ __('Registrar ponto') }}
        </flux:button>
        <div>
            <table class="table-auto w-full mt-4">
                <thead>
                    <tr>
                        <th>{{ __('Data') }}</th>
                        <th>{{ __('Hora') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timeClocks as $timeClock)
                        <tr>
                            <td>{{ $timeClock->created_at->format('d/m/Y') }}</td>
                            <td>{{ $timeClock->created_at->format('H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
