<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Rumos')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="grid grid-cols-2">
                <div class="p-10">
                    <h3 class="text-2xl px-6 py-6">Cadastro da Equipe de Orientação</h3>
                    <p class="px-6 text-sm text-gray-600">Curso de {{ $course->community->title }}-{{ $course->number}}/{{$course->year }}</p>
                </div>
                <div class="p-2 px-6 py-6 text-right">
                    <button type="submit" class="inline-flex rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <a href="{{ route('people.create') }}">Cadastrar</a>
                    </button>
                </div>
            </div>
            <form method="POST" action="{{ route('rumos.orientation.store') }}">
                @csrf
                @include('rumo.includes._formOrientation')
            </form>
        </div>
    </div>
</x-app-layout>