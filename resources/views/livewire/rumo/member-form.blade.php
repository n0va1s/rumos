<div>
    <form method="POST" wire:submit.prevent="save()">
        <x-jet-dialog-modal id="member-{{now()}}" wire:model="isVisible">
            <x-slot name="title">
                Cursistas
            </x-slot>
            <x-slot name="content">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="p-6 bg-white">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="member.course_leader_id" class="block text-sm font-bold text-gray-700">Monitor
                                    (obrigatório)</label>
                                <select wire:model="member.course_leader_id" id="member.course_leader_id" autocomplete="monitor"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required autofocus>
                                    <option value="">Selecione</option>
                                    @foreach ($leaders as $leader)
                                        <option value="{{ $leader->id }}">{{ $leader->person->first_name }}
                                            {{ $leader->person->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="member.person_id" class="block text-sm font-bold text-gray-700">Cursista
                                    (obrigatório)</label>
                                <select wire:model="member.person_id" id="member.person_id" autocomplete="nome"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required>
                                    <option value="">Selecione</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->person->first_name }}
                                            {{ $member->person->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <label for="member.information" class="block text-sm font-bold text-gray-700">Informações
                                    (opcional)</label>
                                <textarea wire:model="member.information" id="member.information" rows="10"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Alguma alergia? Algum medicamento?">{{ old('information') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <x-button.save></x-button.save>
                    <x-button.close wire:click="closeMemberForm()" />
                </div>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
