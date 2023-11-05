@extends('layouts.app')
@section('content')

<body>

    <div class="options">
    <ul>
    <li><a href="{{ route('login') }}"> Login </li>
    <li><a href="{{ route('register') }}"> Register </li>
    </ul>
    </div>

    <div>
    @if (Route::has('login'))
        <div>
            <div class="welcome">
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
                     <!--   <div class="buttons"><li><a href="{{ route('login') }}">Log in</a></div></li>
                        <div class="buttons"><li><a href="{{ route('register') }}">Register</a></div></li> -->
                    @endauth
                </ul>
            </div>
            <hr>
            <div class="lorem">
               <p> Lorem ipsum! dolor sit amet consectetur adipisicing elit. Eius blanditiis dignissimos nihil harum, eum quis
                nisi laudantium quaerat laborum ratione mollitia tenetur consequuntur alias libero animi error numquam
                nesciunt officia!</p>
            </div>
        </div>
        {{-- <div class="tap"></div> --}}
    @endif
    </div>
@endsection

<button onclick="Mode()">Mode</button>
<body>
