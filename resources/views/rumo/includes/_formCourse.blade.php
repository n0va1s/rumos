<div class="overflow-hidden sm:rounded-md">
    <div class="p-6 bg-white">
        <div class="grid grid-cols-6 gap-6">
            <x-select.community class="col-span-6 sm:col-span-3" label="Secretariado (obrigatório)" :options="$communities" :selected="Auth::user()->community_id" :disabled="false" :required="true"></x-select.community>
            <div class="col-span-6 sm:col-span-3">
                <label for="type_id" class="block text-sm font-bold text-gray-700">Tipo (obrigatório)</label>
                <select name="type_id" autocomplete="tipo" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required autofocus>
                    <option value="">Selecione</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if(isset($type_id) and ($type->id == old('type_id'))) selected @endif>{{ $type->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="number" class="block text-sm font-bold text-gray-700">Número (obrigatório)</label>
                <input type="number" name="number" autocomplete="number" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('number') }}" required>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="starts_at" class="block text-sm font-bold text-gray-700">Data de início  (obrigatória)</label>
                <input type="date" name="starts_at" autocomplete="starts_at" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('starts_at') }}" required>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="ends_at" class="block text-sm font-bold text-gray-700">Data de término (obrigatória)</label>
                <input type="date" name="ends_at" autocomplete="ends_at" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('ends_at') }}" required>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <label for="information" class="block text-sm font-bold text-gray-700">Informações (opcional)</label>
                <textarea name="information" rows="10" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Algum problema de infraestrutura? Sentiu falta de alguma coisa?">{{ old('information') }}</textarea>
            </div>
        </div>
        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
            <x-button.save></x-button.save>
            <x-button.back action="rumos.index"></x-button.back>
        </div>
    </div>
</div>