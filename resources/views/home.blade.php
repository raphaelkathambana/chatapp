@extends('layouts.app')
@section('content')
    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <body>
        <div class="background">
            <div class="mess" id="animation-send"></div>
            {{-- <div class="lets-chat"><h4> Let's chat! </h4></div> --}}
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

        <div class="invite-text"> <p> Connect with friends and chat endlessly!</p>
        </div>

        </div>
        <div class="nav">
            @if (Route::has('login'))
                @auth
                    <div class="search_input_container">

                        <i class="fa-solid fa-magnifying-glass" style="color: var(--searchIcon);margin-left:1px"></i>
                        <input class="user_search_input" name="user_search_input" id="user_search_input"
                            placeholder="Search friends" />
                    </div>

                    <div> <button id="lets-chat"> <a href="{{ route('chat.testNewChat') }}">Lets Chat!</button></a> </div>
                    <i onClick="redirect('/home')" class="fa-solid fa-house"
                        style="color: var(--profileIcon);font-size:25px; margin-left:50px; margin-right:20px;"></i>
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
        <div class="drop-home-container">

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
            <div class="chat-screen">

                <div class="chat">
                    <!-- chat messages go here-->
                    {{-- <div class="lets-chat">
                        <h4 style="color: var(--color3); font-size:40px;"> Let's chat !</h4>
            </div> --}}
                <!-- chat input -->
                <div>
                    {{-- a form to take in the input from the user --}}
                    <form action="{{ route('chat.sendMessage') }}" method="POST">
                        @csrf
                        <label for="check">
                            <!-- the recepient's user id -->
                            <input type="hidden" name="receiverid" value="">
                            <!-- the message -->
                            <input type="text" name="message" placeholder="Type your message..." autocomplete="off"
                            required>
                        </label>
                        <button type="submit">
                            {{-- <i class="fa-sharp fa-light fa-paper-plane" style="color: var(--profileIcon);font-size:24px; cursor:pointer;background-color:#ffff;color: var(--color2); margin:2px auto;"></i> --}}
                            <i class="fa-solid fa-paper-plane" style="color: #010d23;font-size:20px;padding:5px auto; margin: 5px auto;"></i>
                            <!-- icon to send message -->
                        </button> <!-- submit button -->
                    </form>
                    {{-- @endif --}}
                </div> <!-- end of chat input -->
            </div>

            </div>
        </div>

        {{-- <div class="set_mode">
    <button onclick="Mode()"><i id="light-toggle" class="fa-solid fa-circle-half-stroke" style="color: #000000"></i></i></button>
    </div> --}}

    </body>

    </html>
@endsection
