<div class="overflow-hidden sm:rounded-md">
    <div class="bg-white p-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="title" class="block text-sm font-bold text-gray-700">Título (obrigatório)</label>
                <input type="text" name="title" placeholder="Ex: Dezembro" autocomplete="título" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->title : old('title')}}" required autofocus>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="group" class="block text-sm font-bold text-gray-700">Grupo (obrigatório)</label>
                <input type="text" name="group" placeholder="Três letras em maiúsculo. Ex: CNT" autocomplete="grupo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{isset($model) ? $model->group : old('group')}}" required>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <x-button.save></x-button.save>
            <x-button.back action="options.index"></x-button.back>
        </div>
    </div>
</div>