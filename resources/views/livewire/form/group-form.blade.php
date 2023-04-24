<div>
    <form method="POST" wire:submit.prevent="save()">
        @csrf
        <x-jet-dialog-modal id="group-{{ now() }}" wire:model="isVisible">
            <x-slot name="title">
                Nova Reunião de Grupo
            </x-slot>
            <x-slot name="content">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="p-6 bg-white">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="group.community_id"
                                    class="block text-sm font-bold text-gray-700">Secretariado (obrigatório)</label>
                                <select wire:model="group.community_id" required {{ !$isAdmin ? 'disabled' : '' }}
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Selecione</option>
                                    @foreach ($communities as $community)
                                        <option value="{{ $community->id }}">
                                            {{ $community->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('group.community_id')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="group.frequency_id" class="block text-sm font-bold text-gray-700">Frequência
                                    (obrigatório)</label>
                                <select id="group.frequency_id" wire:model="group.frequency_id"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required autofocus>
                                    <option value="">Selecione</option>
                                    @foreach ($frequencies as $frequency)
                                        <option value="{{ $frequency->id }}">{{ $frequency->title }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('group.frequency_id')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6">
                                <label for="group.information" class="block text-sm font-bold text-gray-700">Informações
                                    (obrigatório)</label>
                                <textarea id="information" wire:model.lazy="group.information" rows="5"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    placeholder="O grupo tem um nome? As reuniões são na casa de quem? Não coloque email ou endereço por questões de segurança"
                                    required>{{ isset($model) ? $model->information : old('information') }}</textarea>
                                <div>
                                    @error('group.information')
                                        <p class="text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                {{-- <x-button.save wire:loading.attr="disabled"></x-button.save> --}}
                <x-button.save wire:loading.class="bg-gray" wire:offline.attr="disabled">Salvar</x-button.save>
                <x-button.close wire:click="close()" />
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
