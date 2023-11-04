@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Phone Number') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your Phone Number.') }}
                            </div>
                        @endif
                        {{ __('Before proceeding, please check your Phone for a verification Code.') }}
                        <div class="text-sm text-gray-600">
                            {{ __('Please enter the OTP sent to your number:') }} {{ auth()->user()->mobile_number }}
                        </div>

                        <form method="POST" action="{{ route('verification.verify-mobile') }}">
                            @csrf
                            <div class="input-container ic1">
                                <input id="code" class="input @error('code') is-invalid @enderror" type="text"
                                    name="code" value="{{ old('code') }}" placeholder=" " autocomplete= "off" required
                                    autofocus>
                                <div class="cut cut-shorter"></div>
                                <label for="code" class="placeholder">Code</label>
                            </div>
                            <button class="button1" type="submit">
                                {{ __('Verify') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
