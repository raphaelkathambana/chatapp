<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ Config::get('app.name', 'Chatify') }}</title>
    {{-- <link rel="icon" href="resources\css\images\logo.png" type="image/icon"> --}}

    <script>
        var dark = true;
        function Mode() {
            if (dark == true){
                document.body.className = "light";
                dark = false;
            }
            else if (dark == false){
                document.body.className = "dark";
                dark = true;
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="{{ asset('assets/js/pages/datatable-pages.init.js') }}"></script>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="dark">
    @yield('content')
</body>
</html>
