@extends('layouts.app')
@section('content')
    <style>
        body {
            align-items: center;
            display: flex;
            justify-content: center;
        }
    </style>



<form class="form" method="POST" action="{{ route('password.request') }}">
    <div class="title">{{ __('Reset Password') }}</div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @csrf
        <div>
            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
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

        </div>
        <button class="button1" type="submit">
            {{ __('Send Link') }}
        </button>

    </form>
@endsection
