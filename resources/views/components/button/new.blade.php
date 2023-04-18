<a href="{{route($action)}}">
    <button {{ $attributes->merge([
        'type'=> 'button', 'class' => 
        'inline-flex align-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'
        ]) 
    }}>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 mr-2" role="img">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        <span class="ml-1 text-sm font-bold">Cadastrar</span>
    </button>
</a>