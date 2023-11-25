<?php

namespace App\Repositories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Redirect;

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
    /**
     * creates a new Message
     * @return mixed
     */
    public function storeMessage(array $data)
    {
        return Message::create($data);
    }

    /**
     * Get the recent users with messages for a given sender.
     *
     * @param int $senderId The ID of the sender.
     * @return array An array of processed message data.
     */
    public function getRecentUsersWithMessage(int $senderId)
    {
        DB::statement("SET SESSION sql_mode = '';");
        $recentMessages = Message::where(function ($query) use ($senderId) {
            $query->where('sender_id', $senderId)
                ->orWhere('receiver_id', $senderId);
        })->groupBy('sender_id', 'receiver_id')
            ->select('sender_id', 'receiver_id', 'message')
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->getFilteredRecentMessages($recentMessages, $senderId);
    }

    /**
     * Get filtered recent messages for a specific sender.
     *
     * @param Collection $recentMessages The collection of recent messages.
     * @param int $senderId The ID of the sender.
     * @return array The filtered recent messages.
     */
    public function getFilteredRecentMessages(Collection $recentMessages, int $senderId)
    {
        $data = [];
        $usedIds = [];
        foreach ($recentMessages as $message) {
            $userId = $message->sender_id == $senderId ? $message->receiver_id : $message->sender_id;
            if (! in_array($userId, $usedIds)) {
                $data[] = [
                    'user_id' => $userId,
                    'message' => $message->message,
                ];
                $usedIds[] = $userId;
            }
        }
        foreach ($data as $key => $userMessage) {
            $data[$key]['name'] = User::where('id', $userMessage['user_id'])->value('name') ?? 'chatify user';
        }
        return $data;
    }
}
