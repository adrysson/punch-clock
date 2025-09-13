<div>
    <!-- Botão Livewire para bater ponto -->
    <button wire:click="punch" class="btn btn-primary">
        {{ __('Bater ponto') }}
    </button>
    <h2 class="mt-4">{{ __('Últimos pontos batidos') }}</h2>
    <ul class="list-group">
        @foreach ($timeClocks as $timeClock)
            <li class="list-group-item">
                {{ $timeClock->created_at->format('d/m/Y H:i:s') }}
            </li>
        @endforeach
    </ul>
</div>
