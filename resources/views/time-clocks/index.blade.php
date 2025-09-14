<x-time-clocks.layout :heading="__('Lista')" :subheading="__('Lista de pontos registrados')">

    <div class="flex flex-col items-center">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Usuário') }}
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
