<div>
    <x-jet-dialog-modal id="record-{{ now() }}" wire:model="isVisible">
        <x-slot name="title">
            Fichas do Secretariado
        </x-slot>
        <x-slot name="content">
            <div class="overflow-hidden sm:rounded-md">
                <div class="p-6 bg-white">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="person.first_name" class="block text-sm font-bold text-gray-700">Candidato(a)</label>
                            @if($record->person)
                                <input type="text" value="{{$record->person->getFullName()}}" disabled class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                            @endif
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="presenter.first_name" class="block text-sm font-bold text-gray-700">Apresentante</label>
                            @if($record->presenter)
                                <input type="text" value="{{$record->presenter->getFullName()}}" disabled class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                            @endif
                        </div>
                        <div class="col-span-6">
                            <label for="record.reason" class="block text-sm font-bold text-gray-700">Vida Cristã</label>                            
                            <div class="flex items-center justify-between p-2">
                                <div>
                                    <h4 class="block text-sm font-bold text-gray-700">Entrar em contato:</h4>
                                    <p class="block text-sm text-gray-700">{{$record->has_acceptance?"Sim":"Não"}}</p>
                                </div>
                                <div>
                                    <h4 class="block text-sm font-bold text-gray-700">Primeira Comunhão:</h4>
                                    <p class="block text-sm text-gray-700">{{$record->has_first_communion?"Sim":"Não"}}</p>
                                </div>
                                <div>
                                    <h4 class="block text-sm font-bold text-gray-700">Crisma:</h4>
                                    <p class="block text-sm text-gray-700">{{$record->has_chrism?"Sim":"Não"}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="record.reason" class="block text-sm font-bold text-gray-700">Motivo</label>                            
                            <textarea rows="5"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    disabled>
                                    {{$record->reason}}
                            </textarea>
                        </div>
                        <div class="col-span-6">
                            <label for="record.other_information" class="block text-sm font-bold text-gray-700">Outras informações</label>
                            <textarea rows="5"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    disabled>
                                    {{$record->other_information}}
                                </textarea>
                        </div>
                        <div class="col-span-6">

                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button wire:click.prevent="aprove('{{ $record->id }}')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                <span class="ml-1 text-sm font-bold">Aprovar</span>                
            </x-button>
            <x-button.close wire:click="close()" />
        </x-slot>
    </x-jet-dialog-modal>
</div>
