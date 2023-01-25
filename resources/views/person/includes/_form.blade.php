<div class="overflow-hidden sm:rounded-md">
    <div class="bg-white p-6">
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
                <label for="birth_at" class="block text-sm font-bold text-gray-700">Data de Nascimento (obrigatória)</label>
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
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <x-button.save></x-button.save>
            <x-button.back  action="people.index"></x-button.back>
        </div>
    </div>
</div>