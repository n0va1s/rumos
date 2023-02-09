<div>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Reuniões de Grupo')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        @include('layouts.flash-message')
        <div class="mt-6 bg-white divide-y rounded-lg shadow-sm">
            <div class="flex p-4">
                <div class="w-full basis-5/6">
                    <h3 class="p-4 text-2xl">Reuniões de Grupo</h3>
                    <p class="px-4 text-sm text-gray-600">Crie uma nova reunião de grupo</p>
                </div>
                <div class="p-6 basis-1/6">
                    <div wire:click="$set('showingModal', true)" wire:loading.attr="disabled" class="p-4 text-gray-900 cursor-pointer">
                        <x-button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-4 mr-2" role="img">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span class="ml-1 text-sm font-bold">Cadastrar</span>
                        </x-button>
                    </div>
                </div>
            </div>
            <!--
            <div wire:offline class="text-white bg-red-800">
                Você está sem conexão com a Internet
            </div>
            -->
            @if (isset($groups))
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead class="border-b">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                                Secretariado
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                                Frequência
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                                Ações
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($groups as $group)
                                            <tr class="border-b">
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                    {{ $group->community->title }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                    {{ $group->frequency->title }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                    <x-button.edit wire:click="edit('{{$group->id}}')"></x-button.edit>
                                                    <x-button.del wire:click="destroy('{{$group->id}}')"></x-button.del>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="p-2">{{ $groups->links() }}</div>
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
    <form method="POST" wire:submit.prevent="save()">
        <x-jet-dialog-modal wire:model="showingModal">
            <x-slot name="title">
                Nova Reunião de Grupo
            </x-slot>
            <x-slot name="content">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="p-6 bg-white">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="community_id" class="block text-sm font-bold text-gray-700">Secretariado (obrigatório)</label>
                                <select name="community_id" wire:model="community_id"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                     required autofocus>
                                    <option value="">Selecione</option>
                                    @foreach ($communities as $community)
                                        <option value="{{ $community->id }}"
                                            {{$community->id == Auth::user()->community_id ? "selected" : ""}}>
                                            {{ $community->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('community_id')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="frequency_id" class="block text-sm font-bold text-gray-700">Frequência
                                    (obrigatório)</label>
                                <select name="frequency_id" wire:model="frequency_id"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required>
                                    <option value="">Selecione</option>
                                    @foreach ($frequencies as $frequency)
                                        <option value="{{ $frequency->id }}"
                                            @if (isset($model) and $frequency->id == $model->frequency_id) selected @endif>
                                            {{ $frequency->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('frequency_id')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-6">
                                <label for="information" class="block text-sm font-bold text-gray-700">Informações
                                    (obrigatório)</label>
                                <textarea name="information" wire:model.lazy="information" rows="5"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    placeholder="O grupo tem um nome? As reuniões são na casa de quem? Não coloque email ou endereço por questões de segurança"
                                    required>{{ isset($model) ? $model->information : old('information') }}</textarea>
                                @error('information')
                                    <p class="text-red-600 ">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" wire:model="group_id">
            </x-slot>
            <x-slot name="footer">
                {{-- <x-button.save wire:loading.attr="disabled"></x-button.save> --}}
                <x-button.save wire:loading.class="bg-gray" wire:offline.attr="disabled">Salvar</x-button.save>
                <x-button.back class="ml-4" action="groups.index" wire:click="$set('showingModal', false)"
                    wire:loading.attr="disabled"></x-button.back>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
    <!--
    <x-jet-confirmation-modal wire:model="showingConfirmation">
        <x-slot name="title">
            Confirma a exclusão?
        </x-slot>
        <x-slot name="content">
            Você quer apagar esta reunião de grupo? Uma vez excluída não será possível recuperar.
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showingConfirmation')" wire:loading.attr="disabled">
                Voltar
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" wire:click="destroy('{{$group->id}}')" wire:loading.attr="disabled">
                Apagar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
    -->
</div>
