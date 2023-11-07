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
            <p id="profile_image_url" class="hidden">{{ Auth::user()->profile_photo }}</p>
            <div id="profile_image_container" class="image_container">
                <img width="100%" id="profile_image" class="profile_image" src="" />
            </div>
            <div>
                <p class="user_name">{{ Auth::user()->name }}</p>
                <p class="user_name">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <br>
        <div class="edit">
            <h3>Edit your details</h3>
        </div>
        <hr>
        <div>
            <p>Edit your bio</p>        
            <!-- <button class="edit_bio_btn" role="button">Edit Bio</button> -->
            
            <form action="" class="about_form">
                <input id="about" name="about" placeholder="Type your about..." class="about_input" />
                <button id="save_btn" class="edit_bio_btn" role="button">Save</button>
            </form>
            
            
            
        </div>
        
        <!-- <hr/> -->
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
            <p style="color: rgb(184, 55, 55);">Delete My Account</p>

            <a href="#">
            <button class="delete_account" role="button">Delete Account</button>
            </a>
        </div>
        <br>
        <hr/>

        </div>
    </body>
    <script>
        (function () {
            let profileUrl = document.querySelector("#profile_image_url");
            let profileImage = document.getElementById("profile_image");
            let path = `uploads/${profileUrl.innerHTML}`;
            if (!path) return;
            profileImage.src = `{{asset('${path}')}}`;
            console.log(profileImage.src);
        })();
        
    </script>

@endsection
