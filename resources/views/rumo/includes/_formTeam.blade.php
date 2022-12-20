<div class="overflow-hidden sm:rounded-md">
    <div class="bg-white p-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="community_id" class="block text-sm font-medium text-gray-700">Equipe</label>
                <select name="community_id" autocomplete="função" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">Selecione</option>
                    @foreach ($teams as $team)
                    <option value="{{ $team->id }}" @if(isset($team_id) and ($team->id == old('team_id'))) selected @endif>{{ $team->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="person_id" class="block text-sm font-medium text-gray-700">Tipo</label>
                <select name="person_id" autocomplete="nome" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">Selecione</option>
                    @foreach ($people as $person)
                    <option value="{{ $person->id }}" @if(isset($person_id) and ($person->id == old('person_id'))) selected @endif>{{ $person->first_name }} {{ $person->last_name }}</option>
                    @endforeach
                </select>
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