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
                <form action="{{ route('logout') }}" method='post' id="logout-form">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Log in</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        @endif
    </div>

    <input style="display: none" type="checkbox" name="" id="check">
    <div class="side">
        <label for="check">
            <span class="span fas fa-times" id="times"></span>
            <span class="span fas fa-bars" id="bars"></span>
        </label>
        <ul class="side-menu ul">
            <li><a href="#">Home</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </div>

    <div class="chat">
        <label for="check">
        <input type="text" >
    </div>
</label>
   <div class="set_mode">
    <button onclick="Mode()"><i id="light-toggle" class="fa-solid fa-circle-half-stroke" style="color: #000000"></i></i></button>
    </div>

</body>
</html>
@endsection
