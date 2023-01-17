<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Reuniões de Grupo')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @include('layouts.flash-message')
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="grid grid-cols-2">
                <div class="p-10">
                    <h3 class="text-2xl px-6 py-6">Reuniões de Grupo</h3>
                    <p class="px-6 mt-1 text-sm text-gray-600">Crie uma nova reunião de grupo</p>
                </div>
                <div class="p-2 px-6 py-6 text-right">
                    <x-button.new  action="groups.create"></x-button.new>
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
                                            Secretariado
                                        </th>
                                        <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                            Frequência
                                        </th>
                                        <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $group)
                                    <tr class="border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $group->community->title }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $group->frequency->title }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <x-button.edit action="groups.edit" id="{{ $group->id }}" class="mt-2"></x-button.edit>
                                            <x-button.del action="groups.destroy" id="{{ $group->id }}" class="mt-2"></x-button.del>
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
                            <small>Não há reuniões de grupo cadastradas</small>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>