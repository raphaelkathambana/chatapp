<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('assets/css/avatar.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <!-- <script src="{{ asset('assets/js/pages/datatable-pages.init.js') }}"></script> -->
        <style>

</style>
    </head>

    <body>
        <div class="container">
            <div class="title">Hi {{Auth::user()->name}}! </div>
            <div class="subtitle">Let's finish setting up your account!</div>
            
            <div class="choose_image_container">
            <span class="material-symbols-outlined">
                photo_camera
            </span>
            <div class="edit_icon aside">
                <span class="material-symbols-outlined white">
                    edit
                </span>
            </div>
            </div>
            <div class="title">Set your profile photo</div>
            <div class="avatar_container">
                <div class="subtitle">Or choose an avatar</div>
                <div class="avatars">
                    <img class="avatar" src="{{asset('avatars/avatar1.png')}}" alt="avatar1">
                    <img class="avatar" src="{{asset('avatars/avatar2.png')}}" alt="avatar2">
                    <img class="avatar" src="{{asset('avatars/avatar3.png')}}" alt="avatar3">
                    <img class="avatar" src="{{asset('avatars/avatar4.png')}}" alt="avatar4">
                    <img class="avatar" src="{{asset('avatars/avatar5.png')}}" alt="avatar5">
                    <img class="avatar" src="{{asset('avatars/avatar6.png')}}" alt="avatar6">
                    <img class="avatar" src="{{asset('avatars/avatar7.png')}}" alt="avatar7">
                </div>
            </div>
            
            
            
        </div>

    

    </body>

    </html>
