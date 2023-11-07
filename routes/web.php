<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProfileImageManager;
use App\Http\Controllers\VerifyMobileController;
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

Route::group(['middleware' => ['auth', 'verify.mobile', 'verified']], function () {
    Route::get('/SetAvatar', function () {
        return view('SetAvatar');
    });
    Route::post('upload_profile_photo', [ProfileImageManager::class, 'upload'])->name('upload_profile.post');
    Route::get('/home', function () {
        return view('home');
    })->middleware('verified');

});
Route::group(['middleware' => 'auth'], function () {
    Route::post('verify-mobile', [VerifyMobileController::class, '__invoke'])
        ->middleware(['throttle:6,1'])
        ->name('verification.verify-mobile');

    Route::view('verify-mobile', 'auth.mobile-verify')->name('verification-mobile.notice');
});
