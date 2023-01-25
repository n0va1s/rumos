<div class="overflow-hidden sm:rounded-md">
    <div class="bg-white p-6">
        <div class="grid grid-cols-6 gap-6">
            <x-select class="col-span-6 sm:col-span-3" label="Secretariado (obrigatório)" :options="$options['communities']" :selected="Auth::user()->community_id" :disabled="false" :required="true"></x-select>
            <div class="col-span-6 sm:col-span-3">
                <label for="frequency_id" class="block text-sm font-bold text-gray-700">Frequência (obrigatório)</label>
                <select name="frequency_id" autocomplete="frequencia" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required autofocus>
                    <option value="">Selecione</option>
                    @foreach ($options['frequencies'] as $frequency)
                    <option value="{{ $frequency->id }}" @if(isset($model) and ($frequency->id == $model->frequency_id)) selected @endif>
                        {{ $frequency->title }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6">
                <label for="information" class="block text-sm font-bold text-gray-700">Informações (obrigatório)</label>
                <textarea name="information" rows="5" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="O grupo tem um nome? As reuniões são na casa de quem? Não coloque email ou endereço por questões de segurança" required>{{isset($model) ? $model->information : old('information')}}</textarea>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <x-button.save></x-button.save>
            <x-button.back action="groups.index"></x-button.back>
        </div>
    </div>
</div>