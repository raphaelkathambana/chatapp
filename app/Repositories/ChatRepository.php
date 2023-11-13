<?php

namespace App\Repositories;

use App\Models\Message;

class ChatRepository
{
    /**
     * Get all a user's chats
     * @return \Illuminate\Database\Eloquent\Collection<\App\Models\Message>
     */
    public function getUserChats(int $senderId, int $receiverId)
    {
        return Message::whereIn('sender_id', [$senderId, $receiverId])
            ->whereIn('receiver_id', [$senderId, $receiverId])
            ->get();
    }
    public function storeMessage(array $data)
    {
        return Message::create([$data]);
    }

}
