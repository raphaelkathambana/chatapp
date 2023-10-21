<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.bunny.net">
   <!-- <link rel="stylesheet" type="text/css" href="{{ asset('SignIn.css') }}"> -->
    <style>
        body {
    align-items: center;
    background-color: #15172b;
    display: flex;
    justify-content: center;
    height: 100vh;
  }

  .form {
    background-color: #15172b;
    border-radius: 20px;
    box-sizing: border-box;
    height: 500px;
    padding: 20px;
    width: 320px;
  }

  .title {
    color: #eee;
    font-family: sans-serif;
    font-size: 36px;
    font-weight: 600;
    margin-top: 30px;
  }

  .subtitle {
    color: #eee;
    font-family: sans-serif;
    font-size: 16px;
    font-weight: 600;
    margin-top: 10px;
  }

  .input-container {
    height: 50px;
    position: relative;
    width: 100%;
  }

  .ic1 {
    margin-top: 40px;
  }

  .ic2 {
    margin-top: 30px;
  }

  .input {
    background-color: #324A5F;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    font-size: 18px;
    height: 80%;
    outline: 0;
    padding: 0px 25px 0;
    width: 120%;
  }

  .cut {
    background-color: #15172b;
    border-radius: 10px;
    height: 20px;
    left: 20px;
    position: absolute;
    top: -20px;
    transform: translateY(0);
    transition: transform 200ms;
    width: 80px;
  }

  .cut-short {
    width: 60px;
  }

  .input:focus ~ .cut,
  .input:not(:placeholder-shown) ~ .cut {
    transform: translateY(8px);
  }

  .placeholder {
    color: #fff;
    font-family: sans-serif;
    left: 20px;
    line-height: 12px;
    pointer-events: none;
    position: absolute;
    transform-origin: 0 50%;
    transition: transform 200ms, color 200ms;
    top: 15px;
  }

  .input:focus ~ .placeholder,
  .input:not(:placeholder-shown) ~ .placeholder {
    transform: translateY(-30px) translateX(10px) scale(0.75);
  }

  .input:not(:placeholder-shown) ~ .placeholder {
    color: #8585dc;
  }

  .input:focus ~ .placeholder {
    color: #f0e8ea;
  }

  button {
    background-color: #08d;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    cursor: pointer;
    font-size: 18px;
    height: 40px;
    margin-top: 38px;
    margin-left: 55px;
    text-align: center;
    width: 60%;
}


        </style>

</head>


<body>

    <form>

        <div class="title">Sign In</div>

        <div class="subtitle">Lets chat! </div>

        <div class="input-container ic1">
            <input id="username" class="input" type="text" placeholder=" " autocomplete= "off" >
            <div class="cut"></div>
            <label for="username" class="placeholder">Username</label>
        </div>

        <div class="input-container ic2">
            <input id="password" class="input" type="password" placeholder="" autocomplete= "off" >
            <div class="cut"></div>
            <label for="password" class="placeholder">Password</label>
        </div>
        </div>


        <button type="submit">Log In</button>

    </form>


</body>

</html>
