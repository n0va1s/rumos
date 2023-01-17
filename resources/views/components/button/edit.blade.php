<a href="{{route($action, $id)}}">
    <button {{ $attributes->merge(['type'=> 'submit', 'class' => 'inline-flex align-center rounded-md border border-gray-400 bg-white px-4 py-2 text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2']) }}>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4D61AB" class="w-4 h-4 mr-2"  role="img">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
        </svg>
        <span class="ml-1 text-sm font-bold">Alterar</span>
    </button>
</a>