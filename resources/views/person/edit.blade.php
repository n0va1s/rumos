<x-app-layout>
    @section('title', 'Pessoa')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="mt-2 bg-white divide-y rounded-lg shadow-sm">
            <form method="POST" action="{{ route('people.update', $model->id) }}">
                @csrf
                @method('PUT')
                @include('person.includes._form');
            </form>
        </div>
    </div>
</x-app-layout>