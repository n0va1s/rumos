<div>
    <form method="POST" wire:submit.prevent="save()">
    @csrf
    <x-jet-dialog-modal wire:model="showingModal">
        <x-slot name="title">
            Nova Reunião de Grupo
        </x-slot>
        <x-slot name="content">
            <div class="overflow-hidden sm:rounded-md">
                <div class="p-6 bg-white">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="community_id" class="block text-sm font-bold text-gray-700">Secretariado (obrigatório)</label>
                            <select name="community_id" wire:model="community_id"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required autofocus>
                                @foreach ($communities as $community)
                                    <option value="{{ $community->id }}"
                                        {{$community->id === Auth::user()->community_id ? 'selected' : ''}}>
                                        {{ $community->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div>
                                @error('community_id')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="frequency_id" class="block text-sm font-bold text-gray-700">Frequência
                                (obrigatório)</label>
                            <select name="frequency_id" wire:model="frequency_id"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                required>
                                <option value="">Selecione</option>
                                @foreach ($frequencies as $frequency)
                                    <option value="{{ $frequency->id }}">{{ $frequency->title }}</option>
                                @endforeach
                            </select>
                            <div>
                                @error('frequency_id')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="information" class="block text-sm font-bold text-gray-700">Informações
                                (obrigatório)</label>
                            <textarea name="information" wire:model.lazy="information" rows="5"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="O grupo tem um nome? As reuniões são na casa de quem? Não coloque email ou endereço por questões de segurança"
                                required>{{ isset($model) ? $model->information : old('information') }}</textarea>
                            <div>
                                @error('information')
                                    <p class="text-red-600 ">{{ $message }}</p>
                                @enderror
                            </div>
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
</div>
