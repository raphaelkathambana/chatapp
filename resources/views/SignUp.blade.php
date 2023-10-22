<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.bunny.net">
    
    <link href="{{ asset('assets/css/signin.css') }}" rel="stylesheet" type="text/css" />



</head>


<body>

    <form action="{{route('signup.post')}}" method="POST" >
        @csrf
        
        <div class="title">Welcome</div>
        <div class="subtitle">Let's create your account!</div>

        @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                <div style="color: red;" class="subtitle">{{$error}}</div>
                @endforeach
            </div>
        @endif

        <div class="input-container ic1">
            <input id="firstname" class="input" type="text" placeholder=" " autocomplete="off" name="firstname" required />
            <div class="cut"></div>
            <label for="firstname" class="placeholder">First name</label>
        </div>

        <div class="input-container ic2">
            <input id="lastname" class="input" type="text" placeholder=" " name="lastname" autocomplete="off" required />
            <div class="cut"></div>
            <label for="lastname" class="placeholder">Last name</label>
        </div>

        <div class="input-container ic2">
            <input id="email" class="input" name="email" type="text" placeholder=" " autocomplete="off" required />
            <div class="cut cut-short"></div>
            <label for="email" class="placeholder">Email</label>
        </div>

        <div class="input-container ic2">
            <input id="password" class="input" name="password" type="password" placeholder=" " autocomplete="off" required />
            <div class="cut cut-short"></div>
            <label for="password" class="placeholder">Password</label>
        </div>

        <button type="submit">Sign Up</button>

    </form>


</body>

</html>
