<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Rumos')
    <div class="max-w-2xl mx-auto sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="bg-white shadow-sm rounded-lg">
            <div class="flex">
                <div class="w-full basis-5/6">
                    <h3 class="p-4 text-2xl">Cadastro de Cursitas</h3>
                    <x-course-detail :course="$course"></x-course-detain>
                </div>
                <div class="basis-1/6 p-6">
                    <x-button.new action="people.create"></x-button.new>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('rumos.member.store') }}">
            @csrf
            <div class="overflow-hidden sm:rounded-md">
                <div class="bg-white p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="course_leader_id" class="block text-sm font-bold text-gray-700">Monitor (obrigatório)</label>
                            <select name="course_leader_id" autocomplete="monitor" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required autofocus>
                                <option value="">Selecione</option>
                                @foreach ($leaders as $leader)
                                <option value="{{ $leader->id }}">{{ $leader->person->first_name }} {{ $leader->person->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="person_id" class="block text-sm font-bold text-gray-700">Cursista (obrigatório)</label>
                            <select name="person_id" autocomplete="nome" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <option value="">Selecione</option>
                                @foreach ($members as $member)
                                <option value="{{ $member->id }}">{{ $member->person->first_name }} {{ $member->person->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label for="information" class="block text-sm font-bold text-gray-700">Informações (opcional)</label>
                            <textarea name="information" rows="10" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Alguma alergia? Algum medicamento?">{{ old('information') }}</textarea>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <x-button.save></x-button.save>
                        <x-button.back action="rumos.back" :id="$course->id"></x-button.back>
                    </div>
                </div>
        </form>
    </div>
</x-app-layout>