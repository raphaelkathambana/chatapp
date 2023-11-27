<?php

namespace App\Repositories;

use App\Events\MessageSent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GenerateTestChats
{
    public function __construct(private ChatRepository $chats)
    {
        $this->chats = $chats;
    }

    public function generateMessages()
    {
        $newMessageOne = $this->chats->storeMessage([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'Hello, how are you?'
        ]);
        event(new MessageSent($newMessageOne->message, User::find(1)));

        $newMessageTwo = $this->chats->storeMessage([
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'I am fine, thank you.'
        ]);
        event(new MessageSent($newMessageTwo->message, User::find(2)));

        $newMessageThree = $this->chats->storeMessage([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'How is your day going?'
        ]);
        event(new MessageSent($newMessageThree->message, User::find(1)));

        $newMessageFour = $this->chats->storeMessage([
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'It is going well, thank you.'
        ]);
        event(new MessageSent($newMessageFour->message, User::find(2)));

        $newMessageFive = $this->chats->storeMessage([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'That is good to hear.'
        ]);
        event(new MessageSent($newMessageFive->message, User::find(1)));

        $newMessageSix = $this->chats->storeMessage([
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'Yes, it is.'
        ]);
        event(new MessageSent($newMessageSix->message, User::find(2)));

        $newMessageSeven = $this->chats->storeMessage([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'I am going to go now'
        ]);
        event(new MessageSent($newMessageSeven->message, User::find(1)));

        $newMessageEight = $this->chats->storeMessage([
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'Okay, bye.'
        ]);
        event(new MessageSent($newMessageEight->message, User::find(2)));

        $newMessageNine = $this->chats->storeMessage([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'Bye.'
        ]);
        event(new MessageSent($newMessageNine->message, User::find(1)));
    }

}
