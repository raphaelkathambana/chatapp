@extends('layouts.app')
@section('content')
<style>
    body {
    align-items: center;
    display: flex;
    justify-content: center;
    background: var(--newbbg);
    width: 90%;
    margin: 100px auto;
    margin-top: 20px;
  }

</style>
    <form class="form" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="login">Welcome</div>
        <div class="sub">Let's create your account!</div>

        <div class="input-container ic1">
            <input id="name" class="input @error('name') is-invalid @enderror" type="text" placeholder=" " autocomplete="off" name="name" value="{{ old('name') }}" />
            <div class="cut cut-shorter"></div>
            <label for="name" class="placeholder"> Name</label>
            @error('name')
                <span style="color: rgb(255, 0, 0);" class="subtitle invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-container ic2">
            <input id="email" class="input @error('email') is-invalid @enderror" name="email" type="text" placeholder=" " autocomplete="off" value="{{ old('email') }}"  />
            <div class="cut cut-shorter"></div>
            <label for="email" class="placeholder">Email</label>
            @error('email')
                <span style="color: rgb(255, 0, 0);" class="subtitle invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-container ic2">
            <input id="password" class="input @error('password') is-invalid @enderror" name="password" type="password" placeholder=" " autocomplete="off" />
            <div class="cut cut-short"></div>
            <label for="password" class="placeholder">Password</label>
            @error('password')
                <span style="color: rgb(255, 0, 0);" class="subtitle invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-container ic2">
            <input id="password-confirm" class="input" name="password_confirmation" type="password" placeholder=" " autocomplete="off" />
            <div class="cut cut-longer"></div>
            <label for="password-confirm" class="placeholder">Confirm Password</label>
        </div>

        <div class="btn">
        <button class="button1" type="submit">Register</button>
        </div>

        <div class="lowerLink">
            <a class="a-link" href="{{ route('login') }}">Already have a account? Log In!</a>
        </div>
    </form>

@endsection
