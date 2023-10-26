<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/avatar.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <!-- <script src="{{ asset('assets/js/pages/datatable-pages.init.js') }}"></script> -->
    <style>
    </style>
</head>

<body>


    <div class="container">
        <div class="blue">
            <div class="title">Hi {{ Auth::user()->name }}! </div>
            <div class="subtitle">Let's finish setting up your account!</div>

            <div class="choose_image_container" id="image_view">
                <!-- <span class="material-symbols-outlined">
                photo_camera
            </span> -->
                <img id="raw_image" src="{{ asset('avatars/avatar4.png') }}" class="raw_image" />
                <div class="edit_icon aside">
                    <span onclick="activateFileInput()" class="material-symbols-outlined white">
                        edit
                    </span>
                </div>
            </div>


        </div>
        <div class="set_profile">Choose an avatar </div>


        <div class="avatar_container">
            <!-- <div class="subtitle">Or choose an avatar</div>-->
            <div class="avatars">
                <img onclick="handleClickAvatar('avatar1')" class="avatar" src="{{ asset('avatars/avatar1.png') }}"
                    alt="avatar1">
                <img onclick="handleClickAvatar('avatar2')" class="avatar" src="{{ asset('avatars/avatar2.png') }}"
                    alt="avatar2">
                <img onclick="handleClickAvatar('avatar3')" class="avatar" src="{{ asset('avatars/avatar3.png') }}"
                    alt="avatar3">
                <img onclick="handleClickAvatar('avatar4')" class="avatar" src="{{ asset('avatars/avatar4.png') }}"
                    alt="avatar4">
                <img onclick="handleClickAvatar('avatar5')" class="avatar" src="{{ asset('avatars/avatar5.png') }}"
                    alt="avatar5">
                <img onclick="handleClickAvatar('avatar6')" class="avatar" src="{{ asset('avatars/avatar6.png') }}"
                    alt="avatar6">
                <img onclick="handleClickAvatar('avatar7')" class="avatar" src="{{ asset('avatars/avatar7.png') }}"
                    alt="avatar7">
            </div>
        </div>
        <button class="done_btn" onclick="activateSubmit()" role="button">Done</button>



    </div>
    <form action="{{ route('upload_profile.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="input_file" class="form-control" id="input_file" hidden>
        <input type="text" value="avatar4.png" hidden name="avatar" id="avatar_input">
        <input id="done_submit" type="submit" hidden />
    </form>

    <script src="{{ asset('assets/js/profile_photo.js') }}"></script>
</body>

</html>

