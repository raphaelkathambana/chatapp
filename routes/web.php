<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileImageManager;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserAboutController;
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

Route::post('/report', [ReportController::class, 'getUsers'])->name('report.post');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::post('upload_profile_photo', [ProfileImageManager::class, 'upload'])->name('upload_profile.post');
    Route::post('/update_about', [UserAboutController::class, 'updateAbout'])->name('update_about.post');
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
    Route::post('/search_user', [HomeController::class, 'searchUser'])->name('search_user.post');

    Route::group(['prefix' => 'chat', 'as' => 'chat.'], function () {
        Route::get('/get-chat', [App\Http\Controllers\MessageController::class, 'index'])->name('get');

        Route::post('/get-chat', [App\Http\Controllers\MessageController::class, 'generateMessages'])->name('generate-messages');

        Route::get('/get-chat/{receiver?}', [App\Http\Controllers\MessageController::class, 'index'])->name('getChatsBySenderAndReceiver');

        Route::post('/get-chat/{receiver?}', [App\Http\Controllers\MessageController::class, 'store'])->name('saveMessage');

        Route::get('/fail', function () {
            return view('chat.fail');
        })->name('fail');

        Route::get('/testNewChat', [MessageController::class, 'indexing'])->name('testNewChat');

        Route::get('/TestNewChat/{receiver?}', [App\Http\Controllers\MessageController::class, 'indexing'])->name('TestingChatsBySenderAndReceiver');

        Route::post('/TestNewChat/send/{receiver?}', [App\Http\Controllers\MessageController::class, 'storing'])->name('sendMessage');

        Route::get('/TestNewChat/get-chats-json/{receiver?}', [App\Http\Controllers\MessageController::class, 'getChatsJSON'])->name('getChatsJSON');

        Route::get('/get-users-json', [App\Http\Controllers\MessageController::class, 'getUsersJSON'])->name('getUsersJSON');
    });
});
