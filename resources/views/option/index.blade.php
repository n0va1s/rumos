<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Opções')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <success-message />
        <div class="mt-2 bg-white divide-y rounded-lg shadow-sm">
            <div class="flex px-4 py-12">
                <livewire:offline />
                <div class="w-full basis-5/6">
                    <h3 class="p-4 text-2xl">Opções</h3>
                    <p class="px-4 text-sm text-gray-600">Administrar as listas do sistema</p>
                </div>
                <div class="p-6 basis-1/6">
                    <x-button.new action="options.create"></x-button.new>
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
                                        <th scope="col" class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                            Grupo
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                            Descrição
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $option)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                            {{ $option->group }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                            {{ $option->title }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                            <x-button.edit action="options.edit" id="{{ $option->id }}" class="mt-2"></x-button.edit>
                                            <x-button.del action="options.destroy" id="{{ $option->id }}" class="mt-2"></x-button.del>
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
                            <small>Não há reuniões de grupo cadastradas</small>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>