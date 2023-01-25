<button {{ 
    $attributes->merge(
    [
        'type' => 'submit', 
        'class' => 'inline-flex align-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'
    ]) 
}}>
    {{ $slot }}
</button>
