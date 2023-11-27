@extends('layouts.app')
@section('content')
    <style>
         body {
            align-items: center;
            display: flex;
            min-height: 100vh;
            justify-content: center;
        }

        /* .update_pass {
            padding: 10px;
            background-color: var(--color3);
            border: none;
            border-radius: 20px;
            min-height: 7vh;
            color: white;
            font-weight: 600;
            width: 50%;
            font-family: Georgia;
            font-size: 15px;
            letter-spacing: 0.10em;
            margin-top: -160px;
            margin-left: 60px;
            cursor: pointer;
        } */
    </style>

    <body>
        <div class="password-reset">
        <div class="lottie">
            <div class="authentication" id="auth-container"></div>

            <script>
                var animation = bodymovin.loadAnimation({
                    container: document.getElementById('auth-container'),
                    path: 'https://lottie.host/0c2f5153-8bc9-41fa-92ed-4612d1deb640/nYSOl8XGpl.json',
                    render: 'svg',
                    loop: true,
                    autoplay: true,
                    name: 'auth'
                });
            </script>

        </div>

    <form class="form" action="{{ route('password.update') }}" method="POST">
        @csrf
        <div class="title">Write New Password</div>

        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="input-container ic2">
            <input id="email" class="input @error('email') is-invalid @enderror" name="email" type="text"
                placeholder=" " autocomplete="off" value="{{ $request->email }}" />
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

        <div>
            <button class="update_pass" type="submit">{{ __('Update Password') }}</button>
        </div>

    </form>
        </div>
    </body>
@endsection
