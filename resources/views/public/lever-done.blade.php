<x-guest-layout>
    @section('title', 'Alavancas')
    <div class="grid max-w-sm grid-cols-1 gap-2 bg-white">
        <div class="px-6 mx-auto ">
            <div class="flex justify-end py-4">
                <a href="{{ route('welcome') }}">
                    <x-button autofocus>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>Início
                    </x-button>
                </a>
            </div>
            <div class="sm:text-center">
                <h2 class="text-lg font-semibold leading-8 text-indigo-600">Sua alavanca foi enviada!</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Valeu pelo carinho :)</p>
                <cite>Me dê uma alavanca e um ponto de apoio e eu moverei o mundo!</cite>
                <p class="text-right">(Arquimedes)</p>
            </div>
            <div class="flex items-center justify-center h-screen">
                <img class="h-auto max-w-full rounded-full" src="{{ asset('img/done.svg') }}">
            </div>
        </div>
    </div>
</x-guest-layout>