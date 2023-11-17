<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\HomeController;
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

Route::get('/SignIn', [AuthManager::class, 'signin'])->name('signin');
Route::get('/SignUp', [AuthManager::class, 'signup'])->name('signup');
Route::post('/SignIn', [AuthManager::class, 'signinPost'])->name('signin.post');
Route::post('/SignUp', [AuthManager::class, 'signupPost'])->name('signup.post');

Route::get('/landing', function () {
    return view('landing');
});
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::post('upload_profile_photo', [ProfileImageManager::class, 'upload'])->name('upload_profile.post');
    Route::get('/home', function () {
        return view('home');
    });
    Route::get('/profile', function () {
        return view('profile');
    });
    Route::view('/profile/edit', 'profile-edit');
    Route::view('/profile/password', 'reset-password');
});



Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/SetAvatar', function () {
        return view('SetAvatar');
    })->name('SetAvatar');
    Route::get('/home', function () {
        return view('home');
    });
    Route::post('/search_user', [HomeController::class,'searchUser'])->name('search_user.post');
    Route::group(['prefix' => 'chat', 'as' => 'chat.'], function() {
        Route::get('/get-chat', [App\Http\Controllers\MessageController::class, 'index'])->name('get');
        Route::get('/get-chat/{receiver?}', [App\Http\Controllers\MessageController::class, 'index'])->name('getChatsBySenderAndReceiver');
        Route::post('/get-chat/{receiver?}', [App\Http\Controllers\MessageController::class, 'store'])->name('saveMessage');
        Route::get('/fail', function() {
            return view('chat.fail');
        })->name('fail');
    });
});
