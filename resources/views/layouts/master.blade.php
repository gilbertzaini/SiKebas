<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetAlert.css') }}" rel="stylesheet">
    @vite(['resources/js/app.js'])
    @yield('additionalHeadContent')
</head>

<body>
    @auth
        @include('components/navbar')
    @endauth
    @yield('content')
</body>

</html>