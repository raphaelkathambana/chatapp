<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
| Example
| Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
|     return (int) $user->id === (int) $id;
| });
*/

/**
 * Define a channel for broadcasting messages between a sender and a receiver.
 *
 * @param  string  $sender  The sender of the message.
 * @param  string  $receiver  The receiver of the message.
 * @return bool
 // // * @return \Illuminate\Broadcasting\Channel  The broadcasting channel.
 */
Broadcast::channel('messenger.{sender}.{receiver}', function ($user) {
    return !is_null($user);
});
