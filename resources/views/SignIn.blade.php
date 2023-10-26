<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('assets/css/signin.css') }}" rel="stylesheet" type="text/css" />

    <link rel="preconnect" href="https://fonts.bunny.net">
</head>


<body>

    <form method="POST" action="{{route('signin.post')}}">
        @csrf
        <div class="title">Sign In</div>

        <div class="subtitle">Lets chat! </div>

        <div class="input-container ic1">
            <input id="username" class="input" type="text" placeholder=" " autocomplete= "off" >
            <div class="cut"></div>
            <label for="username" class="placeholder">Username</label>
        </div>

        <div class="input-container ic2">
            <input id="password" class="input" type="password" placeholder="" autocomplete= "off" >
            <div class="cut"></div>
            <label for="password" class="placeholder">Password</label>
        </div>
        </div>


        <button type="submit">Log In</button>

    </form>


</body>

</html>
