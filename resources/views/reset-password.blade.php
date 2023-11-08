@extends('layouts.app')
@section('content')
    <style>
        body {
            align-items: center;
            display: flex;
            justify-content: center;
        }
    </style>
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <div class="title">Write New Password</div>

        <!-- I commented out the input below, do something about it -->
        <!-- <input type="hidden" name="token" value="$request->route('token')"> -->

        <div class="input-container ic2">
            <input id="email" class="input @error('email') is-invalid @enderror" name="email" type="text"
                placeholder=" " autocomplete="off" 
                value="{{Auth::user()->email}}" 
                />
            <div class="cut cut-shorter"></div>
            <label for="email" class="placeholder">Email</label>
            @error('email')
                <span class="error invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="input-container ic2">
            <input id="password" class="input @error('password') is-invalid @enderror" name="password" type="password"
                placeholder=" " autocomplete="off" required />
            <div class="cut cut-short"></div>
            <label for="password" class="placeholder">Password</label>
            @error('password')
                <span class="error invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="input-container ic2">
            <input id="password-confirm" class="input" name="password_confirmation" type="password" placeholder=" "
                autocomplete="off" required />
            <div class="cut cut-longer"></div>
            <label for="password-confirm" class="placeholder">Confirm Password</label>
        </div>

        <button class="button1" type="submit">
            {{ __('Update Password') }}
        </button>
    </form>
@endsection
