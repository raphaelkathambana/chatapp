@extends('layouts.app')
@section('content')
    <form>
        <div class="title">Hi {{ Auth::user()->name }}! </div>
        <div class="subtitle">Let's finish setting up your account!</div>
    </form>
@endsection
