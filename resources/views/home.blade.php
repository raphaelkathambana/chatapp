@extends('layouts.app')
@section('content')
    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <body>
        <div class="background">
            <div class="mess" id="animation-send"></div>

            <script>
                var animation = bodymovin.loadAnimation({
                    container: document.getElementById('animation-send'),
                    path: 'https://lottie.host/5ee34794-9b6a-4b52-80fa-666f57569a02/WpjPzWvMHC.json',
                    render: 'svg',
                    loop: true,
                    autoplay: true,
                    name: 'plane'
                });
            </script>

        </div>
        <div class="nav">
            @if (Route::has('login'))
                @auth
                    <div class="search_input_container">

                        <i class="fa-solid fa-magnifying-glass" style="color: var(--searchIcon);"></i>
                        <input class="user_search_input" name="user_search_input" id="user_search_input"
                            placeholder="Search friends" />
                    </div>

                    <div> <a href="{{ route('chat.testNewChat') }}">Chat Page Updated</a> </div>
                    <i onClick="redirect('/home')" class="fa-solid fa-house"
                        style="color: var(--profileIcon);font-size:25px; margin-left:550px; margin-right:20px;"></i>
                    <i onClick="redirect('/profile')" class="fa-solid fa-circle-user"
                        style="color: var(--profileIcon);font-size:30px; cursor:pointer; margin-right:30px;"></i>

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

        <div class="side_list" id="side_list">
            <!-- Contents of this div are in public/assets/js/home.js line 20 - 35 and css in home.css from line 75 -->
        </div>

        <input style="display: none" type="checkbox" name="" id="check">
        {{-- <div class="side">
            <label for="check">
                <span class="span fas fa-times" id="times"></span>
                <span class="span fas fa-bars" id="bars"></span>
            </label>
            <ul class="side-menu ul">
                <button onclick="Mode()">Mode</button>
                <li><a href="{{ route('chat.generate-messages') }}">Chat</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About</a></li>
            </ul>

        </div> --}}

        <div class="side_list" id="side_list">
            <!-- Contents of this div are in public/assets/js/home.js line 20 - 35 and css in home.css from line 75 -->
        </div>
        <div class="chat">
            <!-- chat messages go here-->
            <div class="lets-chat">
                <h4 style="color: var(--color3); font-size:40px;"> Let's chat !</h4>
            </div>
            <!-- chat input -->
            <div>
                {{-- a form to take in the input from the user --}}
                <form action="{{ route('chat.sendMessage') }}" method="POST">
                    @csrf
                    <label for="check">
                        <!-- the recepient's user id -->
                        <input type="hidden" name="receiverid" value="">
                        <!-- the message -->
                        <input type="text" name="message" placeholder="Type your message..." autocomplete="off" required>
                    </label>
                    <button type="submit">
                        <i class="fa-solid fa-paper-plane"
                            style="color: var(--sendIcon); margin:10px; font-size:19px; cursor: pointer; border:solid 2px;padding:6px;border-radius:10px;"></i>
                        <!-- icon to send message -->
                    </button> <!-- submit button -->
                </form>
                {{-- @endif --}}
            </div> <!-- end of chat input -->

        </div>
        {{-- <div class="set_mode">
    <button onclick="Mode()"><i id="light-toggle" class="fa-solid fa-circle-half-stroke" style="color: #000000"></i></i></button>
    </div> --}}

    </body>

    </html>
@endsection
