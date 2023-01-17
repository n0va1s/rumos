<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Pessoas')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="grid grid-cols-2">
                <div class="p-10">
                    <h3 class="text-2xl px-6 py-6">Pessoas</h3>
                    <p class="px-6 mt-1 text-sm text-gray-600">Cadastre alguém que trabalhou em um Curso de Emaús ou novo(a) um cursista</p>
                </div>
                <div class="p-2 px-6 py-6 text-right">
                    <x-button.new action="people.create"></x-button.new>
                </div>
            </div>
            @if(count($data) > 0)
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                            Nome
                                        </th>
                                        <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                            Email
                                        </th>
                                        <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                            Celular
                                        </th>
                                        <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $person)
                                    <tr class="border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $person->first_name}} {{ $person->last_name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $person->email }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $person->phone }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <x-button.edit action="people.edit" id="{{ $person->id }}" class="mt-2"></x-button.edit>
                                            <x-button.del action="people.destroy" id="{{ $person->id }}" class="mt-2"></x-button.del>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="max-w-2xl mx-auto">
                <div class="bg-white shadow-sm rounded-lg divide-y">
                    <div class="grid grid-cols-2">
                        <div class="p-6">
                            <p>Ops...</p>
                            <small>Não há pessoas cadastradas</small>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>