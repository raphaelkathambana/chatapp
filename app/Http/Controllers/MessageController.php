<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use App\Repositories\ChatRepository;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct(private ChatRepository $chats)
    {
        $this->chats = $chats;
    }
    /**
     * Display the chat messages for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int|null  $receiverId
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request, ?int $receiverId = null)
    {
        $messages = empty($receiverId) ? [] : $this->chats->getUserChats($request->user()->id, $receiverId);
        return view('chat.chat-layout', [
            'messages' => $messages,
            'recentMessages' => $this->chats->getRecentUsersWithMessage($request->user()->id),
            'receiver' => User::find((int) $receiverId)
        ]);
    }

    /**
     * Store a new message in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int|null  $receiverId
     */
    public function store(Request $request, ?int $receiverId = null)
    {
        if (empty($receiverId) && $receiverId == 0) {
            return view('chat.fail', [
                "wa"=>$receiverId,
                "wawawa"=> $request->get("receiverid"),
                "message"=> $request->get("message"),
            ]);
        }
        $request->validate([
            'receiverid' => 'required|integer',
            'message' => 'required|string',
        ]);
        $newMessage = $this->chats->storeMessage([
            'sender_id' => (int) Auth::user()->id,
            'receiver_id' => $request->get("receiverid"),
            'message' => $request->get('message'),
        ]);

        event(new MessageSent($newMessage->message));
        return Redirect::route('chat.getChatsBySenderAndReceiver', $receiverId);
    }
}
