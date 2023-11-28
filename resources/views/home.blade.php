@extends('layouts.app')
@section('content')
    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        table {
            width: 83%;
            border-collapse: collapse;
            /* margin-top: 18px; */
           float: right;

        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        tr{
        &:nth-of-type(even) {
		/* background:rgb(100,100,110); */
            background: var(--color2);
        color:white;
	}
    &:nth-of-type(odd) {
		/* background:rgb(100,100,110); */
            background: white;
        color:black;
	}
}

        th {
            background-color: #ffffff;
        }

        div {
            margin-top: 60px;
            display: flex;
            align-items: center;
            margin-left: 300px;
        }

        h1{
        margin-top: -46px;
        padding: -8px auto;
        margin-left: -20px;
        letter-spacing: 0.10rem;
        font-family: 'Georgia';
        font-size: 34px;
        color: var(--color3);
        }
    </style>

    <body>
        @if(Auth::user() -> name == 'shanikwa')

           <div class="side">
            <label for="check">
                {{-- <span class="span fas fa-times" id="times"></span>
                <span class="span fas fa-bars" id="bars"></span> --}}


            </label>
            <ul class="side-menu ul">
                {{-- <button onclick="Mode()">Mode</button> --}}
                <li><a href="#">My profile</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>

        <div class="hello">
            <h1>Hello {{ Auth::user() ->name }}</h1>
            </div>
            <form method="POST" action="{{ route('report.post') }}" id="func">
                @csrf
                <button id="display-user" type="submit" style="margin-left:10px;"">Refresh Report </button>
                <button id="display-user" type="submit">Download excel</button>
            </form>
            <br>

            @if (isset($users))
            {{-- <div style="display:flex; align-items: center">

            </div> --}}
            {{-- @if (isset($users)) --}}

            <div class="table">

            </div>

        </div>

            <table border="2">
                <tr>
                    <th>Name</th>
                    <th>Email address</th>
                    <th>User about</th>
                    <th>Email verified on</th>
                </tr>

                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->about }}</td>
                    <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>

                    {{-- <td>{{ date('d-m-Y', strtotime($user->email_verified_at)) }}</td> --}}
                </tr>
                @endforeach
            </table>


            {{-- @endforeach --}}
            @endif
        @else
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
@endif
        {{-- <div class="set_mode">
    <button onclick="Mode()"><i id="light-toggle" class="fa-solid fa-circle-half-stroke" style="color: #000000"></i></i></button>
    </div> --}}

    </body>

    </html>
@endsection

       {{-- <div style="display:flex; align-items: center; margin-left:200px;">
                <p>Name</p> |
                <p>Account created on</p> |
                <p>User about</p> |
                <p>Email verified on</p> |
            </div>
            @foreach ($users as $user)
            <div style="display:flex; align-items: center">
                <p>{{$user -> name}}</p> |
                <p>{{date('d-m-Y', strtotime($user->created_at))}}</p> |
                <p>{{$user -> about}}</p> |
                <p>{{date('d-m-Y', strtotime($user->email_verified_at))}}</p> |
            </div> --}}
