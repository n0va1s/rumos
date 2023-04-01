<div>
    <form method="POST" wire:submit.prevent="save()">
        @csrf
        <x-jet-dialog-modal id="person-{{ now() }}" wire:model="isVisible">
            <x-slot name="title">
                Nova Pessoa
            </x-slot>
            <x-slot name="content">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="p-6 bg-white">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.first_name" class="block text-sm font-bold text-gray-700">Nome
                                    (obrigatório)</label>
                                <input type="text" wire:model.lazy="person.first_name" id="person.first_name"
                                    placeholder="José Pedro" autocomplete="nome"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="{{ old('person.first_name') }}" required autofocus>
                                <div>
                                    @error('person.first_name')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.last_name" class="block text-sm font-bold text-gray-700">Sobrenome
                                    (obrigatório)</label>
                                <input type="text" wire:model.lazy="person.last_name" id="person.last_name"
                                    placeholder="da Silva" autocomplete="sobrenome"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="{{ old('person.last_name') }}" required>
                                <div>
                                    @error('person.last_name')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.birth_at" class="block text-sm font-bold text-gray-700">Data de
                                    Nascimento (obrigatória)</label>
                                <input type="date" wire:model.defer="person.birth_at" id="person.birth_at"
                                    autocomplete="nascimento"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="{{ old('person.birth_at') }}" required>
                                <div>
                                    @error('person.birth_at')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.gender_id" class="block text-sm font-bold text-gray-700">Gênero
                                    (obrigatório)</label>
                                <select wire:model="person.gender_id" id="person.gender_id" autocomplete="gênero"
                                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required>
                                    <option value="">Selecione</option>
                                    @foreach ($genders as $gender)
                                        <option wire:key="gender-{{ $gender->id }}" value="{{ $gender->id }}">
                                            {{ $gender->title }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('person.gender_id')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.email" class="block text-sm font-bold text-gray-700">Email
                                    (obrigatório)</label>
                                <input type="email" wire:model.lazy="person.email" id="person.email"
                                    placeholder="nome@gmail.com" autocomplete="nascimento"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="{{ old('person.email') }}" required>
                                <div>
                                    @error('person.email')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.phone" class="block text-sm font-bold text-gray-700">Celular
                                    (obrigatório)</label>
                                <input type="tel" wire:model.lazy="person.phone" id="person.phone"
                                    placeholder="(00)988776655" autocomplete="nascimento"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="{{ old('person.phone') }}" required>
                                <div>
                                    @error('person.phone')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.social" class="block text-sm font-bold text-gray-700">Rede Social
                                    (opcional)</label>
                                <input type="url" wire:model.lazy="person.social" id="person.social"
                                    placeholder="https://instagram.com/XXXX" autocomplete="rede social"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="{{ old('person.social') }}">
                                <div>
                                    @error('person.social')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.address.state_id" class="block text-sm font-bold text-gray-700">UF
                                    (opcional)</label>
                                <select wire:model="person.address.state_id" id="person.address.state_id" autocomplete="uf"
                                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Selecione</option>
                                    @foreach ($ufs as $uf)
                                        <option wire:key="state-{{ $uf->id }}" value="{{ $uf->id }}">
                                            {{ $uf->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('person.address.state_id')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.address.description" class="block text-sm font-bold text-gray-700">Logradouro
                                    (opcional)</label>
                                <input type="text" wire:model.lazy="person.address.description" id="person.address.description"
                                    autocomplete="logradouro"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="{{ old('person.address.description') }}">
                                <div>
                                    @error('person.address.description')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.address.number" class="block text-sm font-bold text-gray-700">Número
                                    (opcional)</label>
                                <input type="text" wire:model.lazy="person.address.number" id="person.address.number"
                                    autocomplete="número"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="{{ old('person.address.number') }}">
                                <div>
                                    @error('person.address.number')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.address.city" class="block text-sm font-bold text-gray-700">Cidade
                                    (opcional)</label>
                                <input type="text" wire:model.lazy="person.address.city" id="person.address.city"
                                    autocomplete="cidade"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="{{ old('person.address.city') }}">
                                <div>
                                    @error('person.address.city')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="person.address.zipcode" class="block text-sm font-bold text-gray-700">CEP
                                    (opcional)</label>
                                <input type="text" wire:model.lazy="person.address.zipcode" id="person.address.zipcode"
                                    autocomplete="CEP"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="{{ old('person.address.zipcode') }}">
                                <div>
                                    @error('person.zipcode')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-button.save wire:loading.class="bg-gray" wire:offline.attr="disabled">Salvar</x-button.save>
                <x-button.close wire:click="closePersonForm()" />
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
