<x-guest-layout>
    @section('title', 'Início')
    <div class="bg-white">
        <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 py-24 px-4 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
            <div>
                <div class="grid grid-cols-2 mb-4 gap-y-8 gap-x-8 py-8 px-4">
                    <div class="w-20 h-20">
                        <img src="{{ asset('img/emaus-colorido.png') }}" alt="Logo colorido do Emaús. Ele apresenta a ilustração de Jesus ao centro com dois discípulos um de cada lado" class="rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Emaús Nacional</h2>
                        <p class="mt-1 text-sm font-medium text-gray-900">Você está na área restrita do portal emaus.org.br</p>
                    </div>
                    @if (Route::has('login'))
                    <!--<div class="fixed top-0 right-0 px-6 py-4">-->
                    @auth
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-5 py-3 text-base font-medium text-white hover:bg-indigo-700">
                        Ir para o painel
                        <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-5 py-3 text-base font-medium text-white hover:bg-indigo-700">
                        Acesso
                        <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
                    </a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-white px-5 py-3 text-base font-medium text-indigo-600 hover:bg-indigo-50">
                        Cadastro
                        <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
                    </a>
                    @endif
                    @endauth
                </div>
                @endif
                <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:gap-y-16 lg:gap-x-8">
                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Nosso propósito é</dt>
                        <dd class="mt-2 text-sm text-gray-500">Atender ao clamor do Papa Paulo VI quando disse:
                            "A atual missão da Igreja é dar Cristo à juventude", criando assim um espaço
                            "onde o Evangelho é transmitido e deve se irradiar"
                        </dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Aqui você pode</dt>
                        <dd class="mt-2 text-sm text-gray-500">
                            <p>Cadastrar novos usuários da área restrita</p>
                            <p>Criar um novo curso, cadastrar seus dirigentes, equipes e cursistas</p>
                            <p>Você também pode aprovar inscrições, imprimir alavancas, visualizar um rumo e cadastrar uma reunião de grupo</p>
                        </dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Qualquer dúvida ou necessidade fale com</dt>
                        <dd class="mt-2 text-sm text-gray-500">comunicacao@emaus.org.br</dd>
                    </div>
                </dl>
            </div>
            <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
                <img src="{{ asset('img/teens.jpg') }}" alt="" class="rounded-lg bg-gray-100">
                <img src="{{ asset('img/teens.jpg') }}" alt="Photo by Naassom Azevedo on Unsplash" class="rounded-lg bg-gray-100">
                <img src="{{ asset('img/priest.jpg') }}" alt="Photo by Jacob Bentzinger on Unsplash" class="rounded-lg bg-gray-100">
                <img src="{{ asset('img/candles.jpg') }}" alt="Photo by Anita Austvika on Unsplash" class="rounded-lg bg-gray-100">
            </div>
        </div>
    </div>
</x-guest-layout>