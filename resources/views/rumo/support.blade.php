<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Rumos')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="bg-white shadow-sm rounded-lg">
            <div class="flex flex-row">
                <div class="basis-5/6">
                    <h3 class="p-4 text-2xl">Cadastro da Equipe de Apoio e Cozinha</h3>
                    <x-course-detail :course="$course"></x-course-detain>
                </div>
                <div class="basis-1/6 p-6">
                    <x-button.new action="people.create"></x-button.new>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('rumos.support.store') }}">
            @csrf
            @include('rumo.includes._formSupport');
        </form>
    </div>
</x-app-layout>