<x-guest-layout>
    @section('title', 'Início')
    <div class="bg-white">
        <div class="grid items-center max-w-2xl grid-cols-1 px-4 py-24 mx-auto gap-y-16 gap-x-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
            <div>
                <div class="grid grid-cols-3 gap-2 px-4 py-8 mb-4">
                    <!-- Logo -->
                    <div class="inline-flex items-center justify-center">
                        <a href="{{ route('welcome') }}">
                            <x-jet-application-mark class="block w-auto h-9" />
                        </a>
                    </div>
                    <div class="text-center">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Emaús Nacional</h2>
                        <p class="mt-1 text-sm font-medium text-gray-900">Você está no portal emaus.org.br</p>
                    </div>
                    @if (Route::has('login'))
                    <!--<div class="fixed top-0 right-0 px-6 py-4">-->
                    @auth
                    <div class="inline-flex items-center justify-center">
                        <a href="{{ url('/dashboard') }}" class="p-4 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700">
                            Ir para a área restrita
                            <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                    @else
                    <div class="inline-flex items-center justify-center">
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center p-4 mr-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700">
                            Acesso
                            <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center p-4 text-base font-medium text-indigo-600 bg-white border border-transparent rounded-md hover:bg-indigo-50">
                            Cadastro
                            <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
                        </a>
                        @endif
                    </div>
                    @endauth
                </div>
                <div class="w-full">
                    <h3 class="font-bold text-gray-900">O que posso fazer sem login</h3>
                </div>
                <div class="flex">
                    <div class="inline-flex p-2 align-center">
                        <a href="{{ route('records.create') }}">
                            <button class="px-4 py-2 text-gray-700 bg-white border border-gray-400 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Preencher uma ficha
                            </button>
                        </a>
                    </div>
                    <div class="inline-flex p-2 align-center">
                        <a href="{{ route('levers.create') }}">
                            <button class="px-4 py-2 text-gray-700 bg-white border border-gray-400 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Enviar uma alavanca
                            </button>
                        </a>
                    </div>
                </div>
                @endif
                <dl class="grid grid-cols-1 gap-2 mt-6 sm:gap-y-16 lg:gap-x-8">
                    <div class="p-2 border-t border-gray-200">
                        <dt class="font-bold text-gray-900">Nosso propósito é</dt>
                        <dd class="text-sm text-gray-500">Atender ao clamor do Papa Paulo VI quando disse:
                            "A atual missão da Igreja é dar Cristo à juventude", criando assim um espaço
                            "onde o Evangelho é transmitido e deve se irradiar"
                        </dd>
                    </div>
                    <div class="p-2 border-t border-gray-200">
                        <dt class="font-bold text-gray-900">Aqui você pode</dt>
                        <dd class="text-sm text-gray-500">
                            <p>Cadastrar novos usuários da área restrita</p>
                            <p>Criar um novo curso, cadastrar seus dirigentes, equipes e cursistas</p>
                            <p>Você também pode aprovar inscrições, imprimir alavancas, visualizar um rumo e cadastrar uma reunião de grupo</p>
                        </dd>
                    </div>
                    <div class="p-2 border-t border-gray-200">
                        <dt class="font-bold text-gray-900">Qualquer dúvida ou necessidade fale com</dt>
                        <dd class="text-sm text-gray-500">comunicacao@emaus.org.br</dd>
                    </div>
                </dl>
            </div>
            <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
                <img src="{{ asset('img/cross.jpg') }}" alt="Photo by Sven Mieke on Unsplash" class="object-cover object-center w-full h-full group-hover:opacity-75">
                <img src="{{ asset('img/teens.jpg') }}" alt="Photo by Joel Muniz on Unsplash" class="object-cover object-center w-full h-full group-hover:opacity-75">
                <img src="{{ asset('img/priest.jpg') }}" alt="Photo by Jacob Bentzinger on Unsplash" class="object-cover object-center w-full h-full group-hover:opacity-75">
                <img src="{{ asset('img/candles.jpg') }}" alt="Photo by Anita Austvika on Unsplash" class="object-cover object-center w-full h-full group-hover:opacity-75">
            </div>
        </div>
    </div>
</x-guest-layout>