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

            <h2 id="header">Profile</h2>

            <div class="profile_header">
                {{-- <p id="profile_image_url" class="hidden">{{ Auth::user()->profile_photo }}</p> --}}
                <div id="profile_image_container" class="image_container">
                    <img width="100%" id="profile_image" class="profile_image" src="uploads/{{ Auth::user()->profile_photo }}" alt="profile image" />
                </div>
                <div>
                    <br /><br /><br /><br /><br /><br /><br />
                    <p class="user_name">{{ Auth::user()->name }}</p>
                    <p class="user_name">{{ Auth::user()->email }}</p>
                    <p class="user_name">{{ Auth::user()->about }}</p> 
                </div>
            </div>

            <div class="column-2">
                <div class="edit"><br /><h3>Edit your details</h3></div>

                <div>
                    <p><span style="font-size: 20px; font-weight:bold;">Edit your bio</span></p>
                    <!-- <button class="edit_bio_btn" role="button">Edit Bio</button> -->

                    <form action="{{ route('update_about.post') }}" method="POST" class="about_form">
                        @csrf
                        <input id="about" name="about" placeholder="Type your about..." class="about_input" required />
                        <button id="save_btn" type="submit" class="edit_bio_btn" role="button">Save</button>
                    </form>
                </div>

                <div>
                    <p><span style="font-size: 20px; font-weight:bold;">Manage Password</p>
                    <a href="/profile/password">
                        <button id="reset_btn" role="button">Reset Password</button>
                    </a>
                </div>

            <div>
                <p><span style="font-size: 20px; font-weight:bold;">Edit your avatar</span></p>
                <a href="/SetAvatar">
                    <button id="reset_btn" role="button">Change profile picture</button></a>
            </div>

                <div class="edit"><h3>Other options</h3></div>

                <div>

                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="profile_signout_btn" role="button">Sign Out</button>
                    <form class="form" action="{{ route('logout') }}" method='post' id="logout-form">
                        @csrf
                    </form>
                </div>


                <div>
                    <a href="#">
                        <button class="delete_account" role="button">Delete Account</button>
                    </a>
                </div>
                <br>

            </div>
        </div>
    </body>
    <script>
        (function() {
            let profileUrl = document.querySelector("#profile_image_url");
            let profileImage = document.getElementById("profile_image");
            let path = `uploads/${profileUrl.innerHTML}`;
            if (!path) return;
            profileImage.src = `{{ asset('${path}') }}`;
            console.log(profileImage.src);
        })();
    </script>
@endsection
