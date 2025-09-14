<x-time-clocks.layout :heading="__('Lista')" :subheading="__('Lista de pontos registrados')">
    <form method="GET" action="{{ route('time-clocks.index') }}" class="flex">
        <div class="flex flex-col mx-6">
            <label for="start_date" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Data inicial') }}</label>
            <input
                type="date"
                id="start_date"
                name="start_date"
                value="{{ request('start_date') }}"
                class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            />
        </div>
        <div class="flex flex-col mx-6">
            <label for="end_date" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Data final') }}</label>
            <input
                type="date"
                id="end_date"
                name="end_date"
                value="{{ request('end_date') }}"
                class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            />
        </div>
        <div class="px-4">
            <flux:button type="submit" variant="primary" class="w-full mt-6">
                {{ __('Filtrar') }}
            </flux:button>
        </div>
        <div class="px-4">
            <flux:button class="w-full mt-6" href="{{ route('time-clocks.index') }}">
                {{ __('Limpar') }}
            </flux:button>
        </div>
    </form>
    <div class="flex flex-col items-center">
        <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Usuário') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Admin') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Data') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Hora') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timeClocks as $timeClock)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4">
                            <a class="text-blue-600" href="{{ route('employees.show', $timeClock->user->id) }}">
                                {{ $timeClock->user->name }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $timeClock->user->admin?->name ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $timeClock->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $timeClock->created_at->format('H:i') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $timeClocks->links() }}
        </div>
    </div>
</x-time-clocks.layout>
