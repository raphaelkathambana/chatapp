@extends('layouts.app')
@section('content')
    <style>
        body {
            align-items: center;
            display: flex;
            justify-content: center;
        }
    </style>
    <form method="POST" action="{{ route('user-password.update') }}">
        @csrf
        @method('PUT')
        <div class="title">{{ __('Write your New Password') }}</div>

        @if (session('status') == 'password-updated')
            <div class="alert alert-success">
                Password updated successfully.
            </div>
        @endif

        <div class="input-container ic2">
            <input id="current_password" type="password"
                class="input @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password"
                required autofocus>
            <div class="cut cut-longer"></div>
            <label for="current_password" class="placeholder">{{ __('Current Password') }}</label>
            @error('current_password', 'updatePassword')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-container ic2">
            <input id="password" class="input @error('password', 'updatePassword') is-invalid @enderror" name="password" type="password"
                placeholder=" " autocomplete="new-password" required />
            <div class="cut cut-short"></div>
            <label for="password" class="placeholder">{{ __('Password') }}</label>
            @error('password', 'updatePassword')
            <span class="error invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="input-container ic2">
            <input id="password-confirm" class="input" name="password_confirmation" type="password" placeholder=" " autocomplete="new-password" required />
            <div class="cut cut-longer"></div>
            <label for="password-confirm" class="placeholder">{{ __('Confirm Password') }}</label>
        </div>
        <div class="center">
            <button class="button1_reset" type="submit">
                {{ __('Update Password') }}
            </button>
        </div>
        
    </form>
@endsection
