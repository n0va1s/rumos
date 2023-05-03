<div>
    <form method="POST" wire:submit.prevent="save()">
        <x-jet-dialog-modal id="support-{{now()}}" wire:init='loadingData()' wire:model="isVisible">
            <x-slot name="title">
                Equipe de Apoio ou Serviço
            </x-slot>
            <x-slot name="content">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="p-6 bg-white">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="team.team_id" class="block text-sm font-bold text-gray-700">Equipe
                                    (obrigatória)</label>
                                <select wire:model="team.team_id" id="team.team_id" autocomplete="equipe"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required autofocus>
                                    <option value="">Selecione</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="team.person_id" class="block text-sm font-bold text-gray-700">Tipo
                                    (obrigatória)</label>
                                <select wire:model="team.person_id" id="team.person_id" autocomplete="nome"
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
                                <label for="team.information" class="block text-sm font-bold text-gray-700">Informações
                                    (opcional)</label>
                                <textarea wire:model="team.information" id="team.information" rows="10"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Algum problema de infraestrutura? Sentiu falta de alguma coisa?">{{ old('information') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <x-button.save />
                    <x-button.close wire:click="closeSupportForm()" />
                </div>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
