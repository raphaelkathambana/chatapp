@extends('layouts.app')
@section('content')
    <h1> Index.php here</h1>
    @if (Route::has('signin'))
        <div>
            <ol class = "menu">
                <li><a href="/"> Welcome</a></li>
                @auth
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ route('logout') }}">Log out</a></li>
                @else
                    <li><a href="{{ route('signin') }}">Sign in</a></li>
                    <li><a href="{{ route('login') }}">Log in</a></li>
                    <li><a href="{{ route('signup') }}">Sign Up</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
                <li><a href="SetAvatar">Set Avatar</a></li>
            </ol>
        </div>
    @endif
    </body>

    </html>
@endsection
