<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Emaús Nacional') }}
        </h2>
    </x-slot>
    @section('title', 'Nossos números')
    <div class="w-full p-4 max-w-7xl">
        <div class="grid grid-cols-3 gap-2 sm:grid-cols-1">
            <div class="flex items-center p-4 bg-white rounded">
                <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 bg-green-200 rounded">
                    <svg class="w-6 h-6 text-green-700 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <span class="text-xl font-bold">{{ $data['total_courses'] }}</span>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">Cursos realizados</span>
                        <span class="ml-2 text-sm font-semibold text-green-500">+12.6% / 2022</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded">
                <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 bg-red-200 rounded">
                    <svg class="w-6 h-6 text-red-700 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <span class="text-xl font-bold">{{ $data['total_communities'] }}</span>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">Número de secretariados</span>
                        <span class="ml-2 text-sm font-semibold text-red-500">-8.1% / 2022</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded">
                <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 bg-green-200 rounded">
                    <svg class="w-6 h-6 text-green-700 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <span class="text-xl font-bold">{{ $data['total_groups'] }}</span>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">Número de grupos</span>
                        <span class="ml-2 text-sm font-semibold text-green-500">+28.4% / 2022</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded">
                <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 bg-green-200 rounded">
                    <svg class="w-6 h-6 text-green-700 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <span class="text-xl font-bold">{{ $data['total_men'] }}</span>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">Número de homens</span>
                        <span class="ml-2 text-sm font-semibold text-green-500">+28.4% / 2022</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded">
                <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 bg-green-200 rounded">
                    <svg class="w-6 h-6 text-green-700 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <span class="text-xl font-bold">{{ $data['total_women'] }}</span>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">Número de mulheres</span>
                        <span class="ml-2 text-sm font-semibold text-green-500">+28.4% / 2022</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded">
                <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 bg-green-200 rounded">
                    <svg class="w-6 h-6 text-green-700 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                    <span
                        class="text-xl font-bold">{{ $course->title }}-{{ $course->number }}/{{ $year }}</span>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">Próximo curso</span>
                        <span class="ml-2 text-sm font-semibold text-green-500">{{ $course->starts_at }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
