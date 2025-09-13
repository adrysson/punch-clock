<x-layouts.app :title="__('Funcionários')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Funcionários') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Lista de funcionários') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="flex flex-col items-center">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Nome') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('E-mail') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4">
                            {{ $employee->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $employee->email }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $employees->links() }}
        </div>
    </div>
</x-layouts.app>
