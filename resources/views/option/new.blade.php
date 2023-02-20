<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Reuniões de Grupo')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-offline></x-offline>
        <div class="mt-2 bg-white divide-y rounded-lg shadow-sm">
            <h3 class="px-6 py-6 text-2xl">Nova Opção de Configuração</h3>
            <form method="POST" action="{{ route('options.store') }}">
                @csrf
                @include('option.includes._form')
            </form>
        </div>
    </div>
</x-app-layout>