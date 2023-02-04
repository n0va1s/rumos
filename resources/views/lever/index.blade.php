<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Alavancas')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="mt-6 bg-white rounded-lg divide-y">
            <div class="flex px-4 py-12">
                <div class="w-full basis-5/6">
                    <h3 class="p-4 text-2xl">Alavancas</h3>
                    <p class="px-4 text-sm text-gray-600">Mande um incentivo ou uma mensagem carinhosa para os(as) nossos(as) cursistas</p>
                </div>
            </div>            
            <form method="POST" action="{{ route('levers.search') }}">
                @csrf
                <div class="bg-white p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <x-select 
                        class="col-span-6 sm:col-span-3"
                        label="Secretariado" 
                        :options="$communities" 
                        :selected="Auth::user()->community_id"
                        :disabled="false">
                        </x-select>
                        @if(isset($courses))
                        <div class="col-span-6 sm:col-span-3">
                            <label for="course_id" class="block text-sm font-medium text-gray-700">Curso</label>
                            <select name="course_id" autocomplete="course_id" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option value="">Selecione</option>
                                @foreach ($courses as $course)
                                <option value="{{ $course->id }}" @if(isset($course_id) and ($course->id == $course_id)) selected @endif>{{ $course->type->title }} - {{$course->number}} / {{$course->start_at|date("Y")}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <x-button.search></x-button.search>                    
                </div>
            </form>
            @if(isset($levers))
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
                                            Remetente
                                        </th>
                                        <th scope="col" class="text-base font-extrabold text-gray-900 px-6 py-4 text-left">
                                            Alavanca
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($levers as $lever)
                                    <tr class="border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $lever->community->title }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $lever->sender }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $lever->information }}
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
                <div class="bg-white shadow-sm rounded-lg divide-y">
                    <div class="grid grid-cols-2">
                        <div class="p-6">
                            <p>Ops...</p>
                            <small>Não há alavancas cadastradas</small>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>