<div>
    @include('partials.time-clock-heading')

    <!-- div com metade do tamanho da tela, centralizada, com flex -->
    <div class="flex flex-col items-center">
        <flux:button variant="primary" wire:click="punch">
            {{ __('Registrar ponto') }}
        </flux:button>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Data') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Hora') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        @foreach ($timeClocks as $timeClock)
                            <tr>
                                <td class="px-6 py-4">
                                    {{ $timeClock->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $timeClock->created_at->format('H:i') }}
                                </td>
                            </tr>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
