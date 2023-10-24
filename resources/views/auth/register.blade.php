@extends('layouts.app')
@section('content')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="title">Welcome</div>
        <div class="subtitle">Let's create your account!</div>

        <div class="input-container ic1">
            <input id="name" class="input @error('name') is-invalid @enderror" type="text" placeholder=" " autocomplete="off" name="name" value="{{ old('name') }}" required />
            <div class="cut"></div>
            <label for="name" class="placeholder">Name</label>
            @error('name')
                <span style="color: red;" class="subtitle invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-container ic2">
            <input id="email" class="input @error('email') is-invalid @enderror" name="email" type="text" placeholder=" " autocomplete="off" value="{{ old('email') }}" required />
            <div class="cut cut-short"></div>
            <label for="email" class="placeholder">Email</label>
            @error('email')
                <span style="color: red;" class="subtitle invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-container ic2">
            <input id="password" class="input @error('password') is-invalid @enderror" name="password" type="password" placeholder=" " autocomplete="off" required />
            <div class="cut cut-short"></div>
            <label for="password" class="placeholder">Password</label>
            @error('password')
                <span style="color: red;" class="subtitle invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-container ic2">
            <input id="password-confirm" class="input" name="password_confirmation" type="password" placeholder=" " autocomplete="off" required />
            <div class="cut cut-short"></div>
            <label for="password-confirm" class="placeholder">Confirm Password</label>
        </div>

        <button type="submit">Sign Up</button>
    </form>
@endsection
