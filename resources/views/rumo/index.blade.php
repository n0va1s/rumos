<x-app-layout>
    @section('title', 'Rumos')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <success-message />
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-offline></x-offline>
        <div class="mt-2 bg-white divide-y rounded-lg shadow-sm">
            <div class="flex px-4 py-12">
                <div class="w-full basis-5/6">
                    <h3 class="p-4 text-2xl">Rumos</h3>
                    <p class="px-4 text-sm text-gray-600">Veja um rumo ou cadastre as informações de cursos já realizados</p>
                </div>
                @if(isset($courses))
                <div class="p-6 basis-1/6">
                    <x-button.new action="rumos.create"></x-button.new>
                </div>
                @endif
            </div>
            <form method="POST" action="{{ route('rumos.search') }}">
                @csrf
                <div class="p-6 bg-white">
                    <div class="grid grid-cols-6 gap-6">
                        <x-select.community class="col-span-6 sm:col-span-3" label="Secretariado" :options="$communities" :selected="Auth::user()->community_id" :disabled="false">
                        </x-select.community>
                    </div>
                </div>
                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <x-button.search></x-button.search>
                </div>
            </form>
            @if(isset($courses))
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                            Secretariado
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                            Curso
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses as $course)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                            {{ $course->community->title }}
                                        </td>
                                        <td class="px-2 py-2 text-sm font-light text-gray-900">
                                            <p>{{$course->type->title}} - {{$course->number}} / {{$course->year}}</p>
                                            <small>{{ date('d-m-Y', strtotime($course->starts_at)) }} a {{ date('d-m-Y', strtotime($course->ends_at)) }}</small>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                            <button type="submit" title="Equipe de orientação" class="inline-flex px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-transparent rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-50 focus:ring-offset-2">
                                                <a href="{{route('rumos.orientation.create', $course)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                                    </svg>
                                                </a>
                                            </button>
                                            <button type="submit" title="Equipe de apoio ou serviço" class="inline-flex px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-transparent rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-50 focus:ring-offset-2">
                                                <a href="{{route('rumos.support.create', $course)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                                    </svg>
                                                </a>
                                            </button>
                                            <button type="submit" title="Cursista" class="inline-flex px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-transparent rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-50 focus:ring-offset-2">
                                                <a href="{{route('rumos.member.create', $course)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                    </svg>
                                                </a>
                                            </button>
                                            <button type="submit" title="Foto oficial" class="inline-flex px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-transparent rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-50 focus:ring-offset-2">
                                                <a href="{{route('rumos.photo.create', $course)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                    </svg>
                                                </a>
                                            </button>
                                            <button type="submit" title="Ver o rumo do curso" class="inline-flex px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-transparent rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-50 focus:ring-offset-2">
                                                <a href="{{route('rumos.show', $course)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                                    </svg>
                                                </a>
                                            </button>
                                            <form action="{{route('rumos.destroy', $course)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Confirma a exclusão?');" title="Excluir o curso" class="inline-flex px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-transparent rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-50 focus:ring-offset-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
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
            @else
            <div class="max-w-2xl mx-auto">
                <div class="bg-white divide-y rounded-lg shadow-sm">
                    <div class="grid grid-cols-2">
                        <div class="p-6">
                            <p>Ops...</p>
                            <small>Não há cursos cadastrados</small>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>