<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link href="{{ asset('assets/css/welcome.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="SignUp"> SignUp</a>
        <a href="SignIn"> SignIn</a>
    </div>

    <input type="checkbox" name="" id="check">
    <div class="side">
        <label for="check">
            <span class="fas fa-times" id="times"></span>
            <span class="fas fa-bars" id="bars"></span>
        </label>
        <ul class="side-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </div>

</body>

</html>
