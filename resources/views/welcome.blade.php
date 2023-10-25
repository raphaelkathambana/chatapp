@extends('layouts.app')
@section('content')
    <h1> Index.php here</h1>
    @if (Route::has('login'))
        <div>
            <ol class = "menu">
                <li><a href="/"> Welcome</a></li>
                @auth
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li>
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form action='{{ route('logout') }}' method='post' id="logout-form">
                            @csrf
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Log in</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
                <li><a href="SetAvatar">Set Avatar</a></li>
            </ol>
        </div>
    @endif
    </body>

    </html>
@endsection
