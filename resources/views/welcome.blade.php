@extends('layouts.app')
@section('content')

    <body>
        @if (Route::has('login'))
            <div class="options">
                <ul>
                    @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form action="{{ route('logout') }}" method='post' id="logout-form">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}"> Sign In </a></li>
                        <li><a href="{{ route('register') }}"> Sign Up </a></li>
                    @endauth
                </ul>
            </div>
        @endif

        <div>
            <div>
                <div class="welcome">
                    <div class="message" id="animation-container"></div>
                    <h1> Welcome To <span class="chatify">Chatify</span></h1>


                    <script>
                        var animation = bodymovin.loadAnimation({
                            container:document.getElementById('animation-container'),
                            path: 'https://lottie.host/140dbc61-982a-49ee-983e-82eea6102d06/sDxlQ7gWtj.json',
                            render: 'svg',
                            loop: true,
                            autoplay: true,
                            name: 'message animation'
                        });
                        </script>
                </div>
                <hr>
                <div class="lorem">
                    <button class="get-started">Let's get started! </button>


                </div>
            </div>
            {{-- <div class="tap"></div> --}}
        </div>
    @endsection

    <div class="set_mode">

            <i onclick="Mode()" id="light-toggle" class="fa-solid fa-circle-half-stroke" style="color: #000000; margin:10px;font-size:20px;"></i>
            </i></i></button>
    </div>

</body>
