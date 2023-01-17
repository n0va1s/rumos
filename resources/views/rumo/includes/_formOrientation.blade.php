<div class="overflow-hidden sm:rounded-md">
    <div class="bg-white p-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Função</label>
                <select name="role_id" autocomplete="função" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">Selecione</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="person_id" class="block text-sm font-medium text-gray-700">Pessoa</label>
                <select name="person_id" autocomplete="nome" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">Selecione</option>
                    @foreach ($people as $person)
                    <option value="{{ $person->id }}">{{ $person->first_name }} {{ $person->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <label for="information" class="block text-sm font-medium text-gray-700">Informações</label>
                <textarea name="information" rows="10" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                placeholder="Algum fato marcante? Lembra de alguém?">{{ old('information') }}</textarea>
            </div>
        </div>
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <x-button.save></x-button.save>
            <x-button.back  action="rumos.back" :id="$course->id"></x-button.back>
        </div>
    </div>