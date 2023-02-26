<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Rumos')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <livewire:offline />
        <div class="bg-white rounded-lg shadow-sm">
            <div class="flex">
                <div class="w-full basis-5/6">
                    <h3 class="p-4 text-2xl">Cadastro da Equipe de Orientação</h3>
                    <x-course-detail :course="$course"></x-course-detain>
                </div>
                <div class="p-6 basis-1/6">
                    <x-button.new action="people.create"></x-button.new>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('rumos.orientation.store') }}">
            @csrf
            <div class="overflow-hidden sm:rounded-md">
                <div class="p-6 bg-white">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="role_id" class="block text-sm font-bold text-gray-700">Função (obrigatória)</label>
                            <select name="role_id" autocomplete="função" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required autofocus>
                                <option value="">Selecione</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="person_id" class="block text-sm font-bold text-gray-700">Pessoa (obrigatória)</label>
                            <select name="person_id" autocomplete="nome" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="">Selecione</option>
                                @foreach ($people as $person)
                                <option value="{{ $person->id }}">{{ $person->first_name }} {{ $person->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label for="information" class="block text-sm font-bold text-gray-700">Informações (opcional)</label>
                            <textarea name="information" rows="10" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Algum fato marcante? Lembra de alguém?">{{ old('information') }}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <x-button.save></x-button.save>
                        <x-button.back action="rumos.back" :id="$course->id"></x-button.back>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>