<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiKebas</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">  
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetAlert.css') }}" rel="stylesheet">
    @vite(['resources/js/app.js'])
    @yield('additionalHeadContent')
</head>

<body>
    @yield('content')

    <script>        
        const burger = () =>
        document.body.classList.toggle("open");
    </script>
</body>

</html>