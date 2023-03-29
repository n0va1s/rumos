<div>
    <form method="POST" wire:submit.prevent="save()">
        {{-- There are many forms in the same page. ID is necessary --}}
        <x-jet-dialog-modal id="orientation-{{now()}}" wire:model="isVisible">
            <x-slot name="title">
                Equipe de Orientação
            </x-slot>
            <x-slot name="content">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="p-6 bg-white">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="leader.role_id" class="block text-sm font-bold text-gray-700">Função
                                    (obrigatória)</label>
                                <select wire:model="leader.role_id" id="leader.role_id" autocomplete="função"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required autofocus>
                                    <option value="">Selecione</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="leader.person_id" class="block text-sm font-bold text-gray-700">Pessoa
                                    (obrigatória)</label>
                                <select wire:model="leader.person_id" id="leader.person_id" autocomplete="nome"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required>
                                    <option value="">Selecione</option>
                                    @foreach ($people as $person)
                                        <option value="{{ $person->id }}">{{ $person->first_name }}
                                            {{ $person->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <label for="leader.information" class="block text-sm font-bold text-gray-700">Informações
                                    (opcional)</label>
                                <textarea wire:model="leader.information" id="leader.information" rows="10"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Algum fato marcante? Lembra de alguém?">{{ old('leader.information') }}</textarea>
                            </div>
                            <input type="hidden" wire:model="leader.course_id" id='leader.course_id'>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-button.save wire:click.prevent="save()" wire:loading.class="bg-gray" wire:offline.attr="disabled">Salvar</x-button.save>
                <x-button.close wire:click="closeOrientationForm()" />
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>