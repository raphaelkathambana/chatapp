<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProfileImageManager;
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

Route::get('/SignIn', [AuthManager::class,'signin'])->name('signin');
Route::get('/SignUp', [AuthManager::class,'signup'])->name('signup');
Route::post('/SignIn', [AuthManager::class,'signinPost'])->name('signin.post');
Route::post('/SignUp', [AuthManager::class,'signupPost'])->name('signup.post');

Route::post('upload_profile_photo', [ProfileImageManager::class,'upload'])->name('upload_profile.post');


Route::get('/SetAvatar', function () {
    return view('SetAvatar');
});



