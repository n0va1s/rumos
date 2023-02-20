<x-guest-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Ficha de Inscrição')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-offline></x-offline>
        <div class="mt-2 bg-white divide-y rounded-lg shadow-sm">
            <h2 class="px-2 py-2 text-2xl">Nova Ficha de Inscrição (passo 2/3)</h2>
            <form method="POST" action="{{ route('records.presenter.store') }}">
                @csrf
                <input type="hidden" name="person_id" value="{{$person->id}}">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="p-6 bg-white">
                        <fieldset class="mt-6">
                            <legend>Informações do(a) apresentante (opcional)</legend>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first_name" class="block text-sm font-bold text-gray-700">Nome</label>
                                    <input type="text" name="first_name" placeholder="José Pedro" autocomplete="nome" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->first_name : old('first_name')}}" autofocus>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last_name" class="block text-sm font-bold text-gray-700">Sobrenome</label>
                                    <input type="text" name="last_name" placeholder="da Silva" autocomplete="sobrenome" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->last_name : old('last_name')}}" >
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="birth_at" class="block text-sm font-bold text-gray-700">Data de Nascimento</label>
                                    <input type="date" name="birth_at" autocomplete="nascimento" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->birth_at : old('birth_at')}}" >
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="gender_id" class="block text-sm font-bold text-gray-700">Gênero</label>
                                    <select name="gender_id" autocomplete="gênero" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" >
                                        <option value="">Selecione</option>
                                        @foreach ($options['genders'] as $gender)
                                        <option value="{{ $gender->id }}" @if(isset($model) and ($model->gender_id == $gender->id)) selected @endif>{{ $gender->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-bold text-gray-700">Email</label>
                                    <input type="email" name="email" placeholder="nome@gmail.com" autocomplete="nascimento" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->email : old('email')}}" >
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone" class="block text-sm font-bold text-gray-700">Celular</label>
                                    <input type="tel" name="phone" placeholder="(00)988776655" autocomplete="nascimento" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->phone : old('phone')}}" >
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="social" class="block text-sm font-bold text-gray-700">Rede Social</label>
                                    <input type="url" name="social" placeholder="https://instagram.com/XXXX" autocomplete="rede social" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->social : old('social')}}">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="uf_id" class="block text-sm font-bold text-gray-700">UF</label>
                                    <select name="uf_id" autocomplete="uf" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="">Selecione</option>
                                        @foreach ($options['ufs'] as $uf)
                                        <option value="{{ $uf->id }}" @if(isset($model->address) and ($model->address->state_id == $uf->id)) selected @endif>{{ $uf->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="description" class="block text-sm font-bold text-gray-700">Logradouro</label>
                                    <input type="text" name="description" autocomplete="logradouro" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->description : old('description')}}">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="number" class="block text-sm font-bold text-gray-700">Número</label>
                                    <input type="text" name="number" autocomplete="número" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->number : old('number')}}">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="city" class="block text-sm font-bold text-gray-700">Cidade</label>
                                    <input type="text" name="city" autocomplete="cidade" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->city : old('city')}}">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="zipcode" class="block text-sm font-bold text-gray-700">CEP</label>
                                    <input type="text" name="zipcode" autocomplete="CEP" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->zipcode : old('zipcode')}}">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <x-button class="inline-flex px-4 py-2 text-gray-700 bg-white border border-gray-400 rounded-md shadow-sm align-center hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Vida Cristã
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