<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Emaús Nacional') }}
        </h2>
    </x-slot>
    @section('title', 'Painel')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-white">
                        <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                            <h2 class="sr-only">Serviços para o Curso de Emaús</h2>
                            <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                                <a href="{{ route('people.index') }}" class="group">
                                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                    </div>
                                    <h3 class="mt-4 text-lg text-gray-700">Meus dados</h3>
                                    <p class="mt-1 text-sm font-medium text-gray-900">Meus dados pessoais como nome e contatos</p>
                                </a>
                                <a href="{{ route('levers.index') }}" class="group">
                                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                    </div>
                                    <h3 class="mt-4 text-lg text-gray-700">Alavancas</h3>
                                    <p class="mt-1 text-sm font-medium text-gray-900">Imprimir as alavancas de um curso</p>
                                </a>
                                <a href="{{ route('rumos.index') }}" class="group">
                                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                    </div>
                                    <h3 class="mt-4 text-lg text-gray-700">Rumo</h3>
                                    <p class="mt-1 text-sm font-medium text-gray-900">Visualizar os dados de um curso ou cadastrar cursos anteriores</p>
                                </a>
                                <a href="{{ route('groups.index') }}" class="group">
                                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                    </div>
                                    <h3 class="mt-4 text-lg text-gray-700">Reuniões de Grupo</h3>
                                    <p class="mt-1 text-sm font-medium text-gray-900">Onde continuar o crescimento</p>
                                </a>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
