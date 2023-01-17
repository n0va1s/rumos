<form action="{{route($action, $id)}}" method="POST">
    @method('DELETE')
    @csrf
    <button onclick="return confirm('Confirma a exclusão?');" {{ $attributes->merge(['type'=> 'submit', 'class' => 'inline-flex align-center rounded-md border border-gray-400 bg-white px-4 py-2 text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2']) }}>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#B63F46" class="w-4 mr-2 fill: red"  role="img">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="ml-1 text-sm font-bold">Excluir</span>
    </button>
</form>