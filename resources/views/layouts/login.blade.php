<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montzerrat" rel="stylesheet">
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,500;1,600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="height: 100vh;">
        <main class="w-100 h-100 background-style ">
            @yield('content')
        </main>
    </div>
</body>

<style>
    *{
        font-family: 'Montserrat', sans-serif;
    }
    .background-style{
        background-image: url('/img/Ondas_layout_top.svg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top; 
    }
    .btn-blue{
        background: #263377
    }
    
    .btn-blue:hover{
        background: #182355
    }
</style>

</html>
