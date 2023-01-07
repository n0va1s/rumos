<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Rumos')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="p-10">
                <h3 class="text-2xl px-6 py-6">Rumo</h3>
                <p class="px-6 mt-1 text-sm text-gray-600">Curso de {{ $course->community->title }}-{{ $course->number}}/{{$course->year }}</p>
            </div>
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Equipe de orientação</h3>
                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead class="border-b">
                                        <tr>
                                            <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                                Secretariado
                                            </th>
                                            <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                                Função
                                            </th>
                                            <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                                Nome
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course->leaders as $leader)
                                        <tr class="border-b">
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $leader->course->community->title }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $leader->role->title }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $leader->person->first_name }} {{ $leader->person->last_name }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Equipe de apoio e serviço</h3>
                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead class="border-b">
                                        <tr>
                                            <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                                Secretariado
                                            </th>
                                            <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                                Função
                                            </th>
                                            <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                                Nome
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course->teams as $team)
                                        <tr class="border-b">
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $team->course->community->title }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $team->team->title }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $team->person->first_name }} {{ $team->person->last_name }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Foto Oficial</h3>
                </div>
                @if(isset($course->photo))
                <div class="px-4 py-5 sm:px-6">
                    <img src="{{ asset('storage/'.$course->photo->url) }}" alt="Foto oficial do Curso de {{ $course->community->title }}-{{ $course->number}}/{{$course->year }}">
                </div>
                @else
                <div class="flex justify-center rounded-md">
                    <div class="px-4 py-5 sm:px-6 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <small>Nenhuma foto</small>
                    </div>
                </div>
                @endif
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <a href="{{ route('rumos.back', $course) }}"><button type="button" class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Voltar</button></a>
            </div>
        </div>
    </div>
</x-app-layout>