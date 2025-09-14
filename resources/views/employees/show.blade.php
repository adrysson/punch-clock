<x-employees.layout :heading="__('Funcionário')" :subheading="__('Dados do funcionário')">
    <div class="w-full max-w-2xl bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-semibold mb-4">{{ $employee->name }}</h2>
        <p class="text-gray-600 mb-2">
            <strong>{{ __('Email:') }}</strong>
            {{ $employee->email }}
        </p>
        <p class="text-gray-600 mb-2">
            <strong>{{ __('Função:') }}</strong>
            {{ $employee->role->name }}
        </p>
        <p class="text-gray-600 mb-2">
            <strong>{{ __('Data de nascimento:') }}</strong>
            {{ $employee->birth_date->format('d/m/Y') }}
        </p>
        <p class="text-gray-600 mb-2">
            <strong>{{ __('Criado em:') }}</strong>
            {{ $employee->created_at->format('d/m/Y H:i') }}
        </p>
        <p class="text-gray-600 mb-4">
            <strong>{{ __('Atualizado em:') }}</strong>
            {{ $employee->updated_at->format('d/m/Y H:i') }}
        </p>
        <p class="text-gray-600 mb-4">
            <strong>{{ __('Registros de ponto:') }}</strong>
            @include('components.employees.time-clock', ['timeClocks' => $employee->timeClocks])
        </p>
    </div>
</x-employees.layout>
