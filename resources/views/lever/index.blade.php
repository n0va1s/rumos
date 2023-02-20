<x-app-layout>
    @section('title', 'Alavancas')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <success-message />
        <div class="mt-2 bg-white divide-y rounded-lg">
            <div class="flex px-4">
                <x-offline />
                <div class="w-full basis-5/6">
                    <h3 class="p-4 text-2xl">Alavancas</h3>
                    <p class="px-4 text-sm text-gray-600">Mande um incentivo ou uma mensagem carinhosa para os(as) nossos(as) cursistas</p>
                </div>
            </div>            
            <form method="POST" action="{{ route('levers.search') }}">
                @csrf
                <div class="p-6 bg-white">
                    <div class="grid grid-cols-6 gap-6">
                        <x-select.community 
                        class="col-span-6 sm:col-span-3"
                        label="Secretariado" 
                        :options="$communities" 
                        :selected="Auth::user()->community_id"
                        :disabled="false">
                        </x-select.community>
                        @if(isset($courses))
                        <div class="col-span-6 sm:col-span-3">
                            <label for="course_id" class="block text-sm font-medium text-gray-700">Curso</label>
                            <select name="course_id" autocomplete="course_id" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option value="">Selecione</option>
                                @foreach ($courses as $course)
                                <option value="{{ $course->id }}" @if(isset($course_id) and ($course->id == $course_id)) selected @endif>{{ $course->type->title }} - {{$course->number}} / {{$course->start_at|date("Y")}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <x-button.search></x-button.search>                    
                </div>
            </form>
            @if(isset($levers))
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
                                            Remetente
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                            Alavanca
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($levers as $lever)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                            {{ $lever->community->title }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                            {{ $lever->sender }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
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
                <div class="bg-white divide-y rounded-lg shadow-sm">
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