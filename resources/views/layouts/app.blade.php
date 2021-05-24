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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,500;1,600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav-admin :user="{{ Auth()->User() }}"></nav-admin>

        <side-bar :user="{{ Auth()->User() }}"></side-bar>

        <main class="main-admin">
            @yield('content')
        </main>
    </div>

</body>
<style>
    *{
        font-family: 'Montserrat', sans-serif;
    }
    .main-admin{
        z-index: -5;
        height: 300vh;
        margin-top: 80px;
        margin-left: 270px;
    }
</style>
</html>
