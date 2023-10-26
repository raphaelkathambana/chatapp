@extends('layouts.app')
@section('content')

<style>
    body {
    align-items: center;
    display: flex;
    justify-content: center;
  }
</style>

    <h1> Welcome To Chatify</h1>
    @if (Route::has('login'))
        <div>
            <ol class = "menu">
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
            </ol>
        </div>
    @endif

@endsection
