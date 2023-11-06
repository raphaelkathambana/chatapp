@extends('layouts.app')
@section('content')
<style>
        body {
            display: flex;
            justify-content: center;
            
        }
    </style>
    <body>
        <div class="profile_page_container">

        <h2>Profile</h2>
        <hr>
        <br>
        <div class="profile_header">
            <div class="image_container"></div>
            <div>
                <p class="user_name">Dennis Mugo</p>
            </div>
        </div>
        <br>
        <div>
            <h3>Edit your details</h3>
        </div>
        <hr>
        <div>
            <p>Edit your bio</p>
                    
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="edit_bio_btn" role="button">Edit Bio</button>
            
            
            
        </div>
        <br>
        <hr/>
        <div>
            <p>Manage Password</p>
            <a href="/forgot-password">
                <button class="edit_bio_btn" role="button">Reset Password</button>
            </a>
        </div>
        <br>
        <hr/>
        <div>
            <p>Signing Out</p>
            
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="profile_signout_btn" role="button">Sign Out</button>

            <form action="{{ route('logout') }}" method='post' id="logout-form">
                    @csrf
                </form>
        </div>
        <br>
        <hr/>
        <div>
            <p style="color: red;">Delete My Account</p>
            <a href="#">
            <button class="delete_account" role="button">Delete Account</button>
            </a>
        </div>
        <br>
        <hr/>

        </div>
    </body>


@endsection