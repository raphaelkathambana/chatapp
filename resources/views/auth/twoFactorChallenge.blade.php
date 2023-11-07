@extends('layouts.app')

@section('content')
    <h1>Please Enter your authentication code to login</h1>
    <form action="{{ url('two-factor-challenge') }}" method="post">
        @csrf
        <label for="code">code:</label>
        <input type="text" id="code" name="code"><br>
        <input type="submit" value="Login">
    </form>
@endsection
