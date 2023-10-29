@extends('layouts.app')
@section('content')
    <style>
        body {
            align-items: center;
            display: flex;
            justify-content: center;
        }
    </style>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="title">Log In</div>
        <div class="subtitle">Lets chat! </div>

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
            <a style="float: right" class="a-link" id="forgot" href="{{ route('password.request') }}">Forgot password?</a><br>
            @error('password')
                <span class="error invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <button class="button1" type="submit">Login</button>
        <div class="lowerLink">
            <a class="a-link" href="{{ route('register') }}">Don't have a account? Sign Up!</a>
        </div>
    </form>
@endsection
