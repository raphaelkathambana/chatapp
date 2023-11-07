@extends('layouts.app')
@section('content')

<body>
    <div class="nav">
        @if (Route::has('login'))
            <a href="/">Chatify</a>
            @auth
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form action='{{ route('logout') }}' method='post' id="logout-form">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Log in</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        @endif
    </div>

    {{ __('You are logged in!') }}
    @if (!auth()->user()->two_factor_secret)
            <div class="card-body">
                <p>You have not enabled two-factor authentication yet.</p>
                <form action="{{ url('user/two-factor-authentication') }}" method="post">
                    @csrf
                    <button type="submit">Enable</button>
                </form>
            </div>
        @else
            <div class="card-body">
                <p>You have enabled two-factor authentication.</p>
                <form action="{{ url('user/two-factor-authentication') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Disable</button>
                </form>
            </div>
    @endif
    @if (session('status') == 'two-factor-authentication-enabled')
        <div class="card-body">
            <p>Two-factor authentication is now enabled. Scan the following QR code using your phone's authenticator application.</p>
            {!! auth()->user()->twoFactorQrCodeSvg() !!}

            <p>Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two-factor authentication device is lost.</p>
            @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                {{ trim($code) }}<br>
            @endforeach
        </div>
    @endif

    <div class="chat">
        <label for="check">
        <input type="text" >
    </div>
</label>

</body>
</html>
@endsection
