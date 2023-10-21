<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('assets/css/signin.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/pages/datatable-pages.init.js') }}"></script>

    </head>

    <body>
        <form>

            <div class="title">Hi </div>

            <div class="subtitle">Let's create your account!</div>

            <div class="input-container ic1">
                <input id="firstname" class="input" type="text" placeholder=" " />
                <div class="cut"></div>
                <label for="firstname" class="placeholder">First name</label>
            </div>

            <div class="input-container ic2">
                <input id="lastname" class="input" type="text" placeholder=" " />
                <div class="cut"></div>
                <label for="lastname" class="placeholder">Last name</label>
            </div>

            <div class="input-container ic2">
                <input id="email" class="input" type="text" placeholder=" " />
                <div class="cut cut-short"></div>
                <label for="email" class="placeholder">Email</label>
            </div>

            <button type="submit">Sign Up</button>

        </form>

    </body>

    </html>
