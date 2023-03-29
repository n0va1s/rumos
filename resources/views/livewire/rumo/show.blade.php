<div>
    <div class="mt-6 bg-white divide-y rounded-lg shadow-sm">
        <x-jet-dialog-modal id="rumo-{{ now() }}" wire:init='loadRumo()' wire:model="isVisible">
            <x-slot name="title">
                Rumo do Curso
                @if (!empty($course))
                    {{ $course->type->title }} - {{ $course->number }} / {{ $course->start_at | date('Y') }} de
                    {{ $course->community->title }}
                @else
                    ""
                @endif
            </x-slot>
            <x-slot name="content">
                <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-bold leading-6 text-gray-900">Equipe de orientação</h3>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">
                                    @if (!empty($course) && count($course->leaders) > 0)
                                        <table class="min-w-full">
                                            <thead class="border-b">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                                        Secretariado
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                                        Função
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                                        Nome
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($course->leaders as $leader)
                                                    <tr class="border-b">
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                            {{ $leader->course->community->title }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                            {{ $leader->role->title }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                            {{ $leader->person->first_name }}
                                                            {{ $leader->person->last_name }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="w-full">
                                            <div class="bg-white divide-y rounded-lg shadow-sm">
                                                <div class="grid grid-cols-2">
                                                    <div class="p-6">
                                                        <p>Ops...</p>
                                                        <small>Equipe não cadastrada ainda</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-bold leading-6 text-gray-900">Equipe de apoio e serviço</h3>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">
                                    @if (!empty($course) && count($course->teams) > 0)
                                        <table class="min-w-full">
                                            <thead class="border-b">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                                        Secretariado
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                                        Função
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                                        Nome
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($course->teams as $team)
                                                    <tr class="border-b">
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                            {{ $team->course->community->title }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                            {{ $team->team->title }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                            {{ $team->person->first_name }}
                                                            {{ $team->person->last_name }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="w-full">
                                            <div class="bg-white divide-y rounded-lg shadow-sm">
                                                <div class="grid grid-cols-2">
                                                    <div class="p-6">
                                                        <p>Ops...</p>
                                                        <small>Equipe não cadastrada ainda</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-bold leading-6 text-gray-900">Cursistas</h3>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">
                                    @if (!empty($members) && count($members) > 0)
                                        <table class="min-w-full">
                                            <thead class="border-b">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                                        Monitor
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-base font-extrabold text-left text-gray-900">
                                                        Cursista
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($members as $member)
                                                    <tr class="border-b">
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                            {{ $member->monitor->person->first_name }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                            {{ $member->person->first_name }}
                                                            {{ $member->person->last_name }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="w-full">
                                            <div class="bg-white divide-y rounded-lg shadow-sm">
                                                <div class="grid grid-cols-2">
                                                    <div class="p-6">
                                                        <p>Ops...</p>
                                                        <small>Equipe não cadastrada ainda</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-bold leading-6 text-gray-900">Foto Oficial</h3>
                    </div>
                    @if (isset($course->photo))
                        <div class="px-4 py-5 sm:px-6">
                            <img src="{{ asset('storage/' . $course->photo->url) }}"
                                alt="Foto oficial do Curso de {{ $course->community->title }}-{{ $course->number }}/{{ $course->year }}">
                        </div>
                    @else
                        <div class="flex justify-center rounded-md">
                            <div class="px-4 py-5 sm:px-6 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-20 h-20">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                                <small>Nenhuma foto</small>
                            </div>
                        </div>
                    @endif
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <x-button.close wire:click="$set('isVisible', false)" />
                </div>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
