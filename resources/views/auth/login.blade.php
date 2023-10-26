@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="title">Log In</div>
        <div class="subtitle">Lets chat! </div>
        <div class="input-container ic1">
            <input id="email" class="input @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" placeholder=" " autocomplete= "off">
            <div class="cut"></div>
            <label for="email" class="placeholder">Email</label>
            @error('email')
                <span style="color: red;" class="subtitle invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-container ic2">
            <input id="password" class="input @error('password') is-invalid @enderror" type="password" name="password" placeholder="" autocomplete= "off">
            <div class="cut"></div>
            <label for="password" class="placeholder">Password</label>
            @error('password')
                <span style="color: red;" class="subtitle invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit">Login</button>
        <a href="{{ route('register') }}">Register</a>
    </form>

@endsection
