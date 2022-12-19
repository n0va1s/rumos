<div class="overflow-hidden sm:rounded-md">
    <div class="bg-white p-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="first_name" placeholder="José Pedro" autocomplete="nome" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->first_name : old('first_name')}}" required>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Sobrenome</label>
                <input type="text" name="last_name" placeholder="da Silva" autocomplete="sobrenome" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->last_name : old('last_name')}}" required>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="birth_at" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                <input type="date" name="birth_at" autocomplete="nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->birth_at : old('birth_at')}}" required>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="gender_id" class="block text-sm font-medium text-gray-700">Gênero</label>
                <select name="gender_id" autocomplete="gênero" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                    <option value="">Selecione</option>
                    @foreach ($options['genders'] as $gender)
                    <option value="{{ $gender->id }}" @if(isset($model) and ($model->gender_id == $gender->id)) selected @endif>{{ $gender->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" placeholder="nome@gmail.com" autocomplete="nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->email : old('email')}}" required>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="phone" class="block text-sm font-medium text-gray-700">Celular</label>
                <input type="tel" name="phone" placeholder="(00)988776655" autocomplete="nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->phone : old('phone')}}" required>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="social" class="block text-sm font-medium text-gray-700">Rede Social</label>
                <input type="url" name="social" placeholder="https://instagram.com/XXXX" autocomplete="rede social" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->social : old('social')}}" required>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="uf_id" class="block text-sm font-medium text-gray-700">UF</label>
                <select name="uf_id" autocomplete="uf" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">Selecione</option>
                    @foreach ($options['ufs'] as $uf)
                    <option value="{{ $uf->id }}" @if(isset($model->address) and ($model->address->state_id == $uf->id)) selected @endif>{{ $uf->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="description" class="block text-sm font-medium text-gray-700">Logradouro</label>
                <input type="text" name="description" autocomplete="logradouro" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->description : old('description')}}">
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="number" class="block text-sm font-medium text-gray-700">Número</label>
                <input type="text" name="number" autocomplete="número" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->number : old('number')}}">
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="city" class="block text-sm font-medium text-gray-700">Cidade</label>
                <input type="text" name="city" autocomplete="cidade" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->city : old('city')}}">
            </div>            
            <div class="col-span-6 sm:col-span-3">
                <label for="zipcode" class="block text-sm font-medium text-gray-700">CEP</label>
                <input type="text" name="zipcode" autocomplete="CEP" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model->address) ? $model->address->zipcode : old('zipcode')}}">
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Salvar</button>
            <a href="{{ route('people.index') }}"><button type="button" class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Voltar</button></a>
        </div>
    </div>
</div>