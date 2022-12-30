<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Pessoa')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <form method="POST" action="{{ route('people.update', $model->id) }}">
                @csrf
                @method('PUT')
                @include('person.includes._form');
            </form>
        </div>
    </div>
</x-app-layout>