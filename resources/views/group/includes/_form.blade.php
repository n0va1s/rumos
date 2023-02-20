<div class="overflow-hidden sm:rounded-md">
    <div class="p-6 bg-white">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="community_id" class="block text-sm font-bold text-gray-700">Secretariado (obrigatório)</label>
                <select name="community_id" autocomplete="secretariado" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required autofocus>
                    <option value="">Selecione</option>
                    @foreach ($communities as $community)
                    <option value="{{ $community->id }}" @if(isset($model) and ($community->id == $model->community_id)) selected @endif>
                        {{ $community->title }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="frequency_id" class="block text-sm font-bold text-gray-700">Frequência (obrigatório)</label>
                <select name="frequency_id" autocomplete="frequencia" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required autofocus>
                    <option value="">Selecione</option>
                    @foreach ($frequencies as $frequency)
                    <option value="{{ $frequency->id }}" @if(isset($model) and ($frequency->id == $model->frequency_id)) selected @endif>
                        {{ $frequency->title }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6">
                <label for="information" class="block text-sm font-bold text-gray-700">Informações (obrigatório)</label>
                <textarea name="information" rows="5" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="O grupo tem um nome? As reuniões são na casa de quem? Não coloque email ou endereço por questões de segurança" required>{{isset($model) ? $model->information : old('information')}}</textarea>
            </div>
        </div>
        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
            <x-button.save></x-button.save>
            <x-button.back action="groups.index"></x-button.back>
        </div>
    </div>
</div>