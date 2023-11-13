<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chat App</title>
    <style>
        /* Chat container */
        .chat-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Chat header */
        .chat-header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        /* Chat messages */
        .chat-messages {
            flex: 1;
            overflow-y: scroll;
            padding: 10px;
            display: flex;
            flex-direction: row;
        }

        /* Chat input */
        .chat-input {
            display: flex;
            align-items: center;
            background-color: #eee;
            padding: 10px;
        }

        .chat-input input[type="text"] {
            flex: 1;
            margin-right: 10px;
            padding: 5px;
            border-radius: 5px;
            border: none;
        }

        /*
      .chat-input button {
        background-color: #333;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
      }*/
        .received {
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
            width: 50%;
            align-self: flex-start;
        }

        .sent {
            background-color: #a7a7a7;
            color: #333;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
            width: 50%;
            align-self: flex-end;
        }
        .chat-sidebar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            width: 20%;
        }
        .chat-screen {
            background-color: #eee;
            color: #333;
            padding: 10px;
            width: 80%;
            display: flex;
            flex-direction: column;
            align-self: flex-end
        }
        .chat-icon {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            transition: color, background-color, 300ms ease-in-out
        }
        .chat-icon > p {
            margin-left: 10px;
        }
        .chat-icon:hover {
            background-color: #a7a7a7;
            color: #333;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .chat-icon > img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="chat-container">
        <div class="chat-header">
            <h1>Chat App</h1>
        </div>
        <div class="chat-messages">
            <div class="chat-sidebar">
                <h3>Users</h3>
                <div class="chat-icons">
                    <div class="chat-icon">
                        <img src="{{ asset('assets/css/c151a2b1-94cb-4c38-af80-c67711b7a7c4.png') }}" alt="Avatar">
                        <p>Some Name</p>
                    </div>
                    <div class="chat-icon">
                        <img src="{{ asset('assets/css/c151a2b1-94cb-4c38-af80-c67711b7a7c4.png') }}" alt="Avatar">
                        <p>Some Name</p>
                    </div>
                    <div class="chat-icon">
                        <img src="{{ asset('assets/css/c151a2b1-94cb-4c38-af80-c67711b7a7c4.png') }}" alt="Avatar">
                        <p>Some Name</p>
                    </div>
                </div>
            </div>
            <div class="chat-screen">
                <!-- Messages will be added dynamically with JavaScript -->
                @foreach ($messages as $message)
                @if ($message->sender_id == Auth::user()->id)
                <div class="received">
                    <p>{{ $message->message }}</p>
                </div>
                @endif
                @if ($message->sender_id != Auth::user()->id)
                <div class="sent">
                    <p>{{ $message->message }}</p>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="chat-input">
            <input type="text" placeholder="Type your message...">
            <i class="fa-solid fa-paper-plane" style="color: #0d133f;">
        </div>
    </div>
</body>

</html>
