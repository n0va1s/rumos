<x-app-layout>
    @section('title', 'Pessoas')
    <div class="max-w-2xl mx-auto sm:p-6 lg:p-8">
        <success-message />
        <div class="mt-2 bg-white divide-y rounded-lg shadow-sm">
            <div class="flex px-4 py-12">
                <livewire:offline />
                <div class="w-full basis-5/6">
                    <h3 class="p-4 text-2xl">Cursistas e Membros</h3>
                    <p class="px-4 text-sm text-gray-600">Cadastre alguém que trabalhou em um Curso de Emaús ou novo(a) um cursista</p>
                </div>
                <div class="p-6 basis-1/6">
                    <x-button.new action="people.create"></x-button.new>
                </div>
            </div>
            @if(count($data) > 0)
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="px-4 text-base font-extrabold text-left text-gray-900">
                                            Nome
                                        </th>
                                        <th scope="col" class="px-4 text-base font-extrabold text-left text-gray-900">
                                            Email
                                        </th>
                                        <th scope="col" class="px-4 text-base font-extrabold text-left text-gray-900">
                                            Celular
                                        </th>
                                        <th scope="col" class="px-4 text-base font-extrabold text-left text-gray-900">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $person)
                                    <tr class="border-b">
                                        <td class="px-2 text-sm font-light text-gray-900">
                                            {{ $person->first_name}} {{ $person->last_name }}
                                        </td>
                                        <td class="px-2 text-sm font-light text-gray-900">
                                            {{ $person->email }}
                                        </td>
                                        <td class="px-2 text-sm font-light text-gray-900">
                                            {{ $person->phone }}
                                        </td>
                                        <td class="px-2 text-sm font-light text-gray-900">
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
                <div class="bg-white divide-y rounded-lg shadow-sm">
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