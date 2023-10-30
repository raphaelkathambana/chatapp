@extends('layouts.app')
@section('content')
    <style>
        body {
            align-items: center;
            display: flex;
            justify-content: center;
        }
    </style>

    @if (Route::has('login'))
        <div>
            <div style="display: flex">
                <h1> Welcome To Chatify</h1>
                <ul class = "list">
                    @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form action='{{ route('logout') }}' method='post' id="logout-form">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Log in</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
            <hr>
            <div class="lorem">
                Lorem ipsum! dolor sit amet consectetur adipisicing elit. Eius blanditiis dignissimos nihil harum, eum quis
                nisi laudantium quaerat laborum ratione mollitia tenetur consequuntur alias libero animi error numquam
                nesciunt officia!
            </div>
        </div>
        <div class="tap"></div>
    @endif
@endsection
