<x-guest-layout>
    @section('title', 'Ficha de Inscrição')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <success-message />
        <div class="mt-2 bg-white divide-y rounded-lg shadow-sm">
            <div class="flex px-4 py-12">
                <livewire:offline />
                <div class="w-full basis-5/6">
                    <h3 class="p-4 text-2xl">Ficha de Inscrição</h3>
                    <p class="px-4 text-sm text-gray-600">Se inscreva para o Curso de Emaús</p>
                </div>
                <div class="p-6 basis-1/6">
                    <x-button.new action="people.create"></x-button.new>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                            Secretariado
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                            Candidato
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                            Apresentante
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $record)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                            {{ $record->person->community }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                            {{ $record->person->first_name }} {{ $record->person->last_name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                            {{ $record->presenter->first_name }} {{ $record->presenter->last_name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                            <x-button.edit action="records.edit" id="{{ $record->id }}" class="mt-2"></x-button.edit>
                                            <x-button.del action="records.destroy" id="{{ $record->id }}" class="mt-2"></x-button.del>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>