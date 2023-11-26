@extends('layouts.app')
@section('content')
    <style>
        body {
            align-items: center;
            display: flex;
            justify-content: center;
        }
    </style>
    <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="login">Log In</div>
        <div class="sub">Lets chat! </div>

        <div>
            <div class="input-container ic1">
                <input id="email" class="input @error('email') is-invalid @enderror" type="text" name="email"
                    value="{{ old('email') }}" placeholder=" " autocomplete= "off">
                <div class="cut cut-shorter"></div>
                <label for="email" class="placeholder">Email</label>

            </div>
            @error('email')
                <span class="error invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror

            <div class="input-container ic2">
                <input id="password" class="input @error('password') is-invalid @enderror" type="password" name="password"
                    placeholder="" autocomplete= "off">
                <div class="cut"></div>
                <label for="password" class="placeholder">Password</label>
            </div>

            @error('password')
                <span class="error invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <div class="forgot"><a style="float: right" class="a-link" href="{{ route('password.request') }}">Forgot password?</a><br></div>
        </div>
        <button class="button1" type="submit">Login</button>
        <div class="lowerLink">
            <a class="a-link" href="{{ route('register') }}">Don't have an account? Sign Up!</a>
        </div>
    </form>

    <div class="lottie">
        <div class="authentication" id="login-container"></div>

        <script>
                var animation = bodymovin.loadAnimation({
                    container: document.getElementById('login-container'),
                    path: 'https://lottie.host/ec1dbf3e-5976-4553-8a67-368a0261f9f2/0Y0QQy2D11.json',
                    render: 'svg',
                    loop: true,
                    autoplay: true,
                    name: 'auth'
                });
            </script>

        </div>


@endsection
