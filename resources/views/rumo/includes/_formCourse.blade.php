<div class="overflow-hidden sm:rounded-md">
    <div class="bg-white p-6">
        <div class="grid grid-cols-6 gap-6">
            <x-select class="col-span-6 sm:col-span-3" label="Secretariado (obrigatório)" :options="$communities" :selected="Auth::user()->community_id" :disabled="false" :required="true"></x-select>
            <div class="col-span-6 sm:col-span-3">
                <label for="type_id" class="block text-sm font-bold text-gray-700">Tipo (obrigatório)</label>
                <select name="type_id" autocomplete="tipo" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required autofocus>
                    <option value="">Selecione</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if(isset($type_id) and ($type->id == old('type_id'))) selected @endif>{{ $type->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="number" class="block text-sm font-bold text-gray-700">Número (obrigatório)</label>
                <input type="number" name="number" autocomplete="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('number') }}" required>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="starts_at" class="block text-sm font-bold text-gray-700">Data de início  (obrigatória)</label>
                <input type="date" name="starts_at" autocomplete="starts_at" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('starts_at') }}" required>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="ends_at" class="block text-sm font-bold text-gray-700">Data de término (obrigatória)</label>
                <input type="date" name="ends_at" autocomplete="ends_at" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('ends_at') }}" required>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <label for="information" class="block text-sm font-bold text-gray-700">Informações (opcional)</label>
                <textarea name="information" rows="10" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Algum problema de infraestrutura? Sentiu falta de alguma coisa?">{{ old('information') }}</textarea>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <x-button.save></x-button.save>
            <x-button.back action="rumos.index"></x-button.back>
        </div>
    </div>
</div>