<x-guest-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Ficha de Inscrição')
    <div class="py-4 bg-white">
        <div class="inline-block max-w-md px-6 mx-auto">
            <x-offline></x-offline>
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
                <h2 class="text-lg font-semibold leading-8 text-indigo-600">Sua ficha foi enviada!</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Obrigado por se inscrever</p>
            </div>
            <div class="flex items-center justify-center h-screen">
                <img class="h-auto max-w-full rounded-full" src="{{ asset('img/done.svg') }}">
            </div>
            <div class="inline-flex items-center justify-center sm:flex-none">
                <div class="inline-flex items-center justify-center sm:flex-none">
                    <!-- Heroicon name: phone -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                    <div class="ml-4">
                        <p class="text-lg font-semibold leading-8 text-gray-900">Nós entraremos em contato pelo Whatsapp</p>
                        <p class="mt-2 text-base leading-7 text-gray-600">Para confirmar seus dados e a melhor data pra você participar do Curso de Emaús.</p>
                    </div>
                </div>
                <div class="inline-flex items-center justify-center sm:flex-none">
                    <!-- Heroicon name: envelope -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                    <div class="ml-4">
                        <p class="text-lg font-semibold leading-8 text-gray-900">Fique ligado no seu email</p>
                        <p class="mt-2 text-base leading-7 text-gray-600">Você receberá suas confirmações do dia, local e horário</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>