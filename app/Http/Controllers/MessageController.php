<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use App\Repositories\ChatRepository;
use App\Repositories\GenerateTestChats;
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
     * Display the chat messages for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int|null  $receiverId
     * @return \Illuminate\Contracts\View\View
     */
    public function indexing(Request $request, ?int $receiverId = null)
    {
        $messages = empty($receiverId) ? [] : $this->chats->getUserChats($request->user()->id, $receiverId);
        return view('chat.chat-layout-jsloading', [
            'messages' => $messages,
            'recentMessages' => $this->chats->getRecentUsersWithMessage($request->user()->id),
            'receiver' => User::find((int) $receiverId)
        ]);
    }

    public function getChatsJSON(Request $request, ?int $receiverId = null)
    {
        $messages = $this->chats->getUserChats($request->user()->id, 2);
        return response()->json($messages);
    }

    public function getUsersJSON(Request $request)
    {
        $users = $this->chats->getRecentUsersWithMessage($request->user()->id);
        return response()->json($users);
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
                "wa" => $receiverId,
                "wawawa" => $request->get("receiverid"),
                "message" => $request->get("message"),
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

        event(new MessageSent($newMessage->message, Auth::user()));
        return Redirect::route('chat.getChatsBySenderAndReceiver', $receiverId);
    }

    /**
     * Generates sample messages and stores them using the chats service.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generateMessages()
    {
        $test = new GenerateTestChats($this->chats);
        $test->generateMessages();
        return Redirect::route('chat.get');
    }
}
