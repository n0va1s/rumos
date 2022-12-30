@props([
    'color' => 'red',
    'title' => 'Erro',
    'message' => 'Erro desconhecido'
])

<div class="border-t border-b px-4 py-3" role="alert" {{ $attributes->merge(['class' => 'text-'.$color.'-800 bg-'.$color.'-100 border-'.$color.'-500']) }}>
    <p class="font-bold">{{ $title }}</p>
    <p class="text-sm">{{ $message }}</p>
</div>