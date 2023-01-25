<x-guest-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Ficha de Inscrição')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="w-full p-6">
                <h2 class="text-2xl">Nova Ficha de Inscrição (passo 1/3)</h2>
            </div>
            <form method="POST" action="{{ route('records.candidate.store') }}">
                @csrf
                <div class="overflow-hidden sm:rounded-md">
                    <div class="bg-white p-6">
                        <fieldset>
                            <legend>Informações do(a) candidato(a)</legend>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first_name" class="block text-sm font-bold text-gray-700">Nome (obrigatório)</label>
                                    <input type="text" name="first_name" placeholder="José Pedro" autocomplete="nome" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->first_name : old('first_name')}}" required autofocus>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last_name" class="block text-sm font-bold text-gray-700">Sobrenome (obrigatório)</label>
                                    <input type="text" name="last_name" placeholder="da Silva" autocomplete="sobrenome" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->last_name : old('last_name')}}" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="birth_at" class="block text-sm font-bold text-gray-700">Data de Nascimento (obrigatório)</label>
                                    <input type="date" name="birth_at" autocomplete="nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->birth_at : old('birth_at')}}" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="gender_id" class="block text-sm font-bold text-gray-700">Gênero (obrigatório)</label>
                                    <select name="gender_id" autocomplete="gênero" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                        <option value="">Selecione</option>
                                        @foreach ($options['genders'] as $gender)
                                        <option value="{{ $gender->id }}" @if(isset($model) and ($model->gender_id == $gender->id)) selected @endif>{{ $gender->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-bold text-gray-700">Email (obrigatório)</label>
                                    <input type="email" name="email" placeholder="nome@gmail.com" autocomplete="nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->email : old('email')}}" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone" class="block text-sm font-bold text-gray-700">Celular (obrigatório)</label>
                                    <input type="tel" name="phone" placeholder="(00)988776655" autocomplete="nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->phone : old('phone')}}" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="social" class="block text-sm font-bold text-gray-700">Rede Social (opcional)</label>
                                    <input type="url" name="social" placeholder="https://instagram.com/XXXX" autocomplete="rede social" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->social : old('social')}}">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="uf_id" class="block text-sm font-bold text-gray-700">UF (opcional)</label>
                                    <select name="uf_id" autocomplete="uf" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="">Selecione</option>
                                        @foreach ($options['ufs'] as $uf)
                                        <option value="{{ $uf->id }}" @if(isset($model->address) and ($model->address->state_id == $uf->id)) selected @endif>{{ $uf->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="description" class="block text-sm font-bold text-gray-700">Logradouro (opcional)</label>
                                    <input type="text" name="description" autocomplete="logradouro" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->description : old('description')}}">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="number" class="block text-sm font-bold text-gray-700">Número (opcional)</label>
                                    <input type="text" name="number" autocomplete="número" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->number : old('number')}}">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="city" class="block text-sm font-bold text-gray-700">Cidade (opcional)</label>
                                    <input type="text" name="city" autocomplete="cidade" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->city : old('city')}}">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="zipcode" class="block text-sm font-bold text-gray-700">CEP (opcional)</label>
                                    <input type="text" name="zipcode" autocomplete="CEP" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->zipcode : old('zipcode')}}">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <x-button class="inline-flex align-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Dados do Apresentante
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>