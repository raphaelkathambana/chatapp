<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/SignIn', function () {
    return view('SignIn');
});

Route::get('/SignUp', function () {
    return view('SignUp');
});

Route::get('/SetAvatar', function () {
    return view('SetAvatar');
});


;
