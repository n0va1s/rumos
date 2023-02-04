<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Reuniões de Grupo')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <h3 class="text-2xl px-6 py-6">Nova Opção de Configuração</h3>
            <form method="POST" action="{{ route('options.store') }}">
                @csrf
                @include('option.includes._form')
            </form>
        </div>
    </div>
</x-app-layout>