<div class="overflow-hidden sm:rounded-md">
    <div class="bg-white p-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="community_id" class="block text-sm font-medium text-gray-700">Secretariado</label>
                <select name="community_id" autocomplete="secretariado" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">Selecione</option>
                    @foreach ($communities as $community)
                    <option value="{{ $community->id }}" @if(isset($community_id) and ($community->id == old('community_id'))) selected @endif>{{ $community->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="type_id" class="block text-sm font-medium text-gray-700">Tipo</label>
                <select name="type_id" autocomplete="tipo" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">Selecione</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if(isset($type_id) and ($type->id == old('type_id'))) selected @endif>{{ $type->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="number" class="block text-sm font-medium text-gray-700">Número</label>
                <input type="number" name="number" autocomplete="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('number') }}">
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="year" class="block text-sm font-medium text-gray-700">Ano</label>
                <input type="number" name="year" autocomplete="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('year') }}">
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="starts_at" class="block text-sm font-medium text-gray-700">Data de Início</label>
                <input type="date" name="starts_at" autocomplete="starts_at" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('starts_at') }}">
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="ends_at" class="block text-sm font-medium text-gray-700">Data de Término</label>
                <input type="date" name="ends_at" autocomplete="ends_at" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('ends_at') }}">
            </div>

            <div class="col-span-6 sm:col-span-6">
                <label for="information" class="block text-sm font-medium text-gray-700">Informações</label>
                <textarea name="information" rows="10" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                placeholder="Algum problema de infraestrutura? Sentiu falta de alguma coisa?">{{ old('information') }}</textarea>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Salvar</button>
            <a href="{{ route('rumos.index') }}"><button type="button" class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Voltar</button></a>
        </div>
      
    </div>