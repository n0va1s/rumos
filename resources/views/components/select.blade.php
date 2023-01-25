@props(
    [
        'disable' => 'false', 
        'required' => 'false'
    ]
)
<div {{ $attributes }}>
    <label for="community_id" class="block text-sm font-bold text-gray-700">{{ $label }}</label>
    <select name="community_id" autocomplete="secretariado" class="block w-full mt-1 rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ $required ? "required": ""}}>
        <option value="">Selecione</option>
        @foreach ($options as $option)
        <option value="{{ $option->id }}" {{ $option->id === $selected ? "selected": "" }} {{ $disabled ? "disabled": ""}}>
            @if(isset($option->first_name)) {{ $option->first_name }} {{ $option->last_name }} @else {{ $option->title }} @endif
        </option>
        @endforeach
    </select>
</div>