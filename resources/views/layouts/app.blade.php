<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <link href="asset-main/css/bootstrap.min.css" rel="stylesheet">

    <link href="asset-main/css/bootstrap-icons.css" rel="stylesheet">

    <link href="asset-main/css/templatemo-topic-listing.css" rel="stylesheet">
</head>

<body>


    <main>
        <x-main.nav-header />

        @yield('content')
        <x-main.footer />
    </main>


    <!-- JAVASCRIPT FILES -->
    <script src="asset-main/js/jquery.min.js"></script>
    <script src="asset-main/js/bootstrap.bundle.min.js"></script>
    <script src="asset-main/js/jquery.sticky.js"></script>
    <script src="asset-main/js/click-scroll.js"></script>
    <script src="asset-main/js/custom.js"></script>
</body>

</html>
