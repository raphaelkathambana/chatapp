@extends('layouts.app')
@section('content')
    <form method="POST" action="{{route('signin.post')}}">
        @csrf
        <div class="title">Sign In</div>
        <div class="subtitle">Lets chat! </div>
        <div class="input-container ic1">
            <input id="username" class="input" type="text" placeholder=" " autocomplete= "off">
            <div class="cut"></div>
            <label for="username" class="placeholder">Username</label>
        </div>
        <div class="input-container ic2">
            <input id="password" class="input" type="password" placeholder="" autocomplete= "off">
            <div class="cut"></div>
            <label for="password" class="placeholder">Password</label>
        </div>
        <button type="submit">Sign In</button>
    </form>

    </body>

    </html>
@endsection
