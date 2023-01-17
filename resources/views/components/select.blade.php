<div {{ $attributes }}>
    <label for="community_id" class="block text-sm font-bold text-gray-700">{{ $label }}</label>
    <select name="community_id" autocomplete="secretariado" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
        <option value="">Selecione</option>
        @foreach ($options as $option)
        <option value="{{ $option->id }}" 
        @if($disabled)
        {{ $option->id === $selected ? "selected": "disabled" }}
        @else
        {{ $option->id === $selected ? "selected": "" }}
        @endif>
        {{ $option->title }}
        </option>
        @endforeach
    </select>
</div>