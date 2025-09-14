<x-employees.layout :heading="__('Lista')" :subheading="__('Lista de funcionários cadastrados')">

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
                    <th scope="col" class="px-6 py-3">
                        {{ __('Ações') }}
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
                        <td class="px-6 py-4">
                            <a href="{{ route('employees.edit', $employee->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{ __('Editar') }}
                            </a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('Tem certeza que deseja excluir este funcionário?')">
                                    {{ __('Excluir') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $employees->links() }}
        </div>
    </div>
</x-employees.layout>
