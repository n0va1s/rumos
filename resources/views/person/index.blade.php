<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Pessoas')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="grid grid-cols-2">
                <div class="p-10">
                    <h3 class="text-2xl px-6 py-6">Pessoas</h3>
                    <p class="px-6 mt-1 text-sm text-gray-600">Cadastre alguém que trabalhou ou um cursista</p>
                </div>
                <div class="p-2 px-6 py-6 text-right">
                    <button type="submit" class="inline-flex rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <a href="{{route('people.create')}}">Cadastrar</a>
                    </button>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                            Nome
                                        </th>
                                        <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                            Email
                                        </th>
                                        <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                            Celular
                                        </th>
                                        <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $person)
                                    <tr class="border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $person->first_name}} {{ $person->last_name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $person->email }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $person->phone }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <button type="submit" class="inline-flex rounded-md border border-transparent bg-white py-2 px-4 text-sm font-medium text-blue-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-50 focus:ring-offset-2">
                                                <a href="{{route('people.edit', $person)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4D61AB" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </a>
                                            </button>
                                            <form action="{{route('people.destroy', $person)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="inline-flex rounded-md border border-transparent bg-white py-2 px-4 text-sm font-medium text-blue-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-50 focus:ring-offset-2" onclick="return confirm('Confirma a exclusão?');">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#B63F46" class="w-6 h-6 fill: red">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>