<div {{ $attributes }}>
    <label for="community_id" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <select name="community_id" autocomplete="secretariado" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ $disabled ? 'disabled' : '' }}>
        <option value="">Selecione</option>
        @foreach ($options as $community)
        <option value="{{ $community->id }}" 
        {{ $community->id === $selected ? "selected": '' }}>
        {{ $community->title }}
        </option>
        @endforeach
    </select>
</div>