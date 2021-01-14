<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="http://fiche-star/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="http://fiche-star/css/app.css" rel="stylesheet">
    <link href="http://fiche-star/css/mobile.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            <h1>Fiches de stars</h1>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
