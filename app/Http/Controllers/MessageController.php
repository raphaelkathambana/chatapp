<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Repositories\ChatRepository;
use Illuminate\Http\Request;
use Redirect;

class MessageController extends Controller
{
    public function __construct(private ChatRepository $chats)
    {
        $this->chats = $chats;
    }
    public function index(Request $request, ?int $receiverId = null)
    {
        $messages = empty($receiverId) ? [] : $this->chats->getUserChats($request->user()->id, $receiverId);
        return view('chat.chat-layout', ['messages' => $messages]);
    }

    public function store(Request $request, ?int $receiverId = null)
    {
        $request->validate([
            'receiver_id' => 'required|integer',
            'message' => 'required|string',
        ]);
        $this->chats->storeMessage([
            'sender_id' => (int) $request->user()->id,
            'receiver_id' => $request->$receiverId,
            'message' => $request->message
        ]);

        event();
        return Redirect::route('chat.getChatsBySenderAndReceiver', $receiverId);
    }
}
