@props(
    [
        'disabled' => 'false', 
        'required' => 'false',
        'label' => '',
        'options' => [],
        'selected' => null

    ]
)
<div {{ $attributes }}>
    <label for="community_id" class="block text-sm font-bold text-gray-700">{{ $label }}</label>
    <select name="community_id" autocomplete="secretariado" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ $required ? "required": ""}}>
        <option value="">Selecione</option>
        @foreach ($options as $option)
        <option value="{{ $option->id }}" {{ $option->id === $selected ? "selected": "" }} {{ $disabled ? "disabled": ""}}>
            @if(isset($option->first_name)) {{ $option->first_name }} {{ $option->last_name }} @else {{ $option->title }} @endif
        </option>
        @endforeach
    </select>
</div>