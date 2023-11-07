@extends('layouts.app')
@section('content')

    <body>

        @if (Route::has('login'))
            <div class="options">
                <ul>
                    @auth
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form action='{{ route('logout') }}' method='post' id="logout-form">
                                @csrf
                            </form>
                        </li>
                        <li><a href="{{ url('/home') }}">Home</a></li>
                    @else
                        <li><a href="{{ route('login') }}"> Sign In </li><br />
                        <li><a href="{{ route('register') }}"> Sign Up</li>
                    @endauth
                </ul>
            </div>
        @endif

        <div>
            <div>
                <div class="welcome">
                    <h1> Welcome To Chatify</h1>
                </div>
                <hr>
                <div class="lorem">
                    <p> Lorem ipsum! dolor sit amet consectetur adipisicing elit. Eius blanditiis dignissimos nihil
                        harum, eum quis
                        nisi laudantium quaerat laborum ratione mollitia tenetur consequuntur alias libero animi error
                        numquam
                        nesciunt officia!</p>
                </div>
            </div>
            {{-- <div class="tap"></div> --}}
        </div>
    @endsection

    <div class="set_mode">

        <button onclick="Mode()"><i id="light-toggle" class="fa-solid fa-circle-half-stroke"
                style="color: #000000"></i></i></button>
    </div>

</body>
