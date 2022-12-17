<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--<title>{{ config('app.name', 'emaus.org.br') }}</title>-->
        <title>@yield('title')</title>
        <meta name="description" content="Uma das maiores e mais antigas comunidades jovens do Brasil, uma verdadeira pós-graduação na fé. Venha conhecer" />
        <meta name="keywords" content="cristão, cristã, católico, católica, Igreja Apóstolica Romana, Igreja de Cristo, Igreja de Roma, Emaús, Comunidade" />
        <meta name="author" content="joaopaulonovais <jp.trabalho@gmail.com>" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <script src=" {{ asset('/js/app.js') }}"></script>
</html>
