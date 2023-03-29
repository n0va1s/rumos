<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Emaús Nacional') }}
        </h2>
    </x-slot>
    @section('title', 'Painel')
    <div class="py-12">
        <div class="mx-auto max-w-7x1 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    <div class="bg-white">
                        <div class="p-6 mx-auto lg:px-8">
                            <livewire:offline />
                            <h2 class="pb-6 text-lg font-bold text-gray-700">Números do Emaús</h2>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-1">
                                <div class="p-4 font-medium text-center bg-gray-200 border-b border-gray-600 rounded">
                                    <h3 class="text-xl">Cursos Realizados</h3>
                                    <p class="mt-6 text-3xl font-thin">200</p>
                                </div>
                                <div class="p-4 font-medium text-center bg-gray-200 border-b border-gray-600 rounded">
                                    <h3 class="text-xl">Cursos Realizados</h3>
                                    <p class="mt-6 text-3xl font-thin">200</p>
                                </div>
                                <div class="p-4 font-medium text-center bg-gray-200 border-b border-gray-600 rounded">
                                    <h3 class="text-xl">Cursos Realizados</h3>
                                    <p class="mt-6 text-3xl font-thin">200</p>
                                </div>
                                <div class="p-4 font-medium text-center bg-gray-200 border-b border-gray-600 rounded">
                                    <h3 class="text-xl">Cursos Realizados</h3>
                                    <p class="mt-6 text-3xl font-thin">200</p>
                                </div>
                                <div class="p-4 font-medium text-center bg-gray-200 border-b border-gray-600 rounded">
                                    <h3 class="text-xl">Cursos Realizados</h3>
                                    <p class="mt-6 text-3xl font-thin">200</p>
                                </div>
                                <div class="p-4 font-medium text-center bg-gray-200 border-b border-gray-600 rounded">
                                    <h3 class="text-xl">Cursos Realizados</h3>
                                    <p class="mt-6 text-3xl font-thin">200</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
