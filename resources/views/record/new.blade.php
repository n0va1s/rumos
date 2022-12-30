<x-guest-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Ficha de Inscrição')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <h2 class="text-2xl px-6 py-6">Nova Ficha de Inscrição</h2>
            <form method="POST" action="{{ route('records.store') }}">
                @csrf
                @include('record.includes._form');
            </form>
        </div>
    </div>
</x-guest-layout>