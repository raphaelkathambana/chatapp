@extends('layouts.app')
@section('content')
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="input-container ic2">
            <input id="email" class="input @error('email') is-invalid @enderror" name="email" type="text" placeholder=" " autocomplete="off" value="{{ $request->email }}" />
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

        <button type="submit">Register</button>
    </form>

@endsection
