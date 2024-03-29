<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Reuniões de Grupo')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <livewire:offline />
        <div class="mt-2 bg-white divide-y rounded-lg shadow-sm">
            <form method="POST" action="{{ route('options.update', $model->id) }}">
                @csrf
                @method('PUT')
                @include('option.includes._form')
            </form>
        </div>
    </div>
</x-app-layout>