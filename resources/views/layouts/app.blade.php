<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Config::get('app.name', 'Chatify') }}</title>
    {{-- <link rel="icon" href="resources\css\images\logo.png" type="image/icon"> --}}

    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web\css') }}">

   <script>
    var dark = true;
    var toggle_icon = document.getElementById("light-toggle");

    function Mode() {
        if (dark == true) {
            document.body.className = "light";
            toggle_icon.setAttribute("class", "fa-solid fa-circle-half-stroke");
            dark = false;
        }
        else if (dark == false) {
            document.body.className = "dark";
            toggle_icon.setAttribute("class", "fa-solid fa-circle-half-stroke fa-rotate-180");
            dark = true;
        }
    }
</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <script src="{{ asset('assets/js/pages/datatable-pages.init.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="dark">
    @yield('content')
</body>
</html>
