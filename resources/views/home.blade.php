@extends('layouts.app')
@section('content')

<script>
    function redirect() {
        window.location.assign("/profile");
    }
</script>

<body>
    <div class="nav">
        @if (Route::has('login'))
            <a href="/">Chatify</a>
            @auth
            
            <i onClick="redirect()" class="fa-solid fa-circle-user" style="color: #fdfdfd; margin-right:20px; float:right; font-size:30px; cursor:pointer; margin-top:-5px;"></i>
                {{-- <a href="{{ url('/home') }}">Home</a>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form class="form" action="{{ route('logout') }}" method='post' id="logout-form">
                    @csrf
                </form> --}}
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
            <button onclick="Mode()">Mode</button>
            <li><a href="{{ route('chat.get') }}">Chat</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </div>

    <div class="chat">
        <label for="check">

        <input type="text" >

    </label>
        <i class="fa-solid fa-paper-plane" style="color: #0d133f; margin:10px; font-size:19px; cursor: pointer; border:solid 2px;padding:6px;border-radius:10px;"></i> <!-- icon to send message -->
    </div>
   {{-- <div class="set_mode">
    <button onclick="Mode()"><i id="light-toggle" class="fa-solid fa-circle-half-stroke" style="color: #000000"></i></i></button>
    </div> --}}

</body>
</html>
@endsection
