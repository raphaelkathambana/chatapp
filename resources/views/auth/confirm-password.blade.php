@extends('layouts.app')

@section('content')
    <h1>Confirm Your Password</h1>
    <form action="{{ url('user/confirm-password') }}" method="post">
        @csrf
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        @error('password')
            <div>{{ $message }}</div>
        @enderror
        <input type="submit" value="Confirm">
    </form>
@endsection
