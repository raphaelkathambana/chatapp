<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Config::get('app.name', 'Chatify Chat') }}</title>

    <script>
        var dark = true;
        var toggle_icon = document.getElementById("light-toggle");

        function Mode() {
            if (dark == true) {
                document.body.className = "light";
                toggle_icon.setAttribute("class", "fa-solid fa-circle-half-stroke fa-rotate-180");
                dark = false;
            } else if (dark == false) {
                document.body.className = "dark";
                toggle_icon.setAttribute("class", "fa-solid fa-circle-half-stroke");
                dark = true;
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- <style>
        a {
            text-decoration: none;
            color: inherit;
        }

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
            padding: 25px;
            border-radius: 5px;
            border: none;
        }


        .chat-input button {
            background-color: transparent;
            color: #fff;
            padding: 0px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

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
            align-self: flex-end;
            overflow: inherit;
            height: -webkit-fill-available;
        }


        .chat-icon {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            transition: color, background-color, 300ms ease-in-out
        }

        .chat-icon>p {
            margin-left: 10px;
        }

        .chat-icon:hover {
            background-color: #d3d3d3;
            color: #333;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .chat-icon>img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .last-message {
            font-size: 12px;
            padding: 0px;
            text-align: right;
            color: #a8a8a8;
        }

        .chat-search-bar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chat-search-bar>img {
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }

        .chat-search-input {
            flex: 1;
            margin-right: 10px;
            padding: 5px;
            border-radius: 5px;
            border: none;
        }

        .chat-username {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            position: absolute;
            top: 30px;
            right: 10px;
            color: #eee
        }

        .chat-username>img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .chat-username>h2 {
            margin-left: 10px;
        }
    </style> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    {{-- container for content --}}
    <div class="chat-container">
        <!-- chat header -->
        <div class="chat-header">
            <h1><a href="{{ route('chat.testNewChat') }}">{{ __('Chat') }}</a></h1>
        </div>
        <!-- chat messages -->
        <div class="chat-messages">
            {{-- chat sidebar --}}
            <div class="chat-sidebar">
                {{-- the search bar --}}
                {{-- Doesn't work --}}
                <div class="chat-search-bar">
                    <img src="{{ asset('assets/css/search.png') }}" alt="search icon">
                    <input type="text" placeholder="Search...">
                </div>
                {{-- the chat icons --}}
                <div class="chat-icons">
                    {{-- loaded as links(a tags) --}}
                    {{-- contains the user's avatar, theeir name, and last message sent --}}
                    <a class="chat-icon" id="chat-icon">
                    </a>
                    {{-- @endforeach --}}
                </div>
            </div> <!-- end of sidebar -->
            {{-- chat screen --}}
            <div class="chat-screen">
                {{-- check if a user has been selected for the chat --}}
                {{-- if not, The following message is displayed --}}
                {{ __('Please Select a User to Start a Chat') }}
                {{-- if a user has been selected, the following is displayed --}}
                {{-- this will contain all the messages from both users in the chat --}}
                {{-- the receiver's name and avatar being displayed --}}
                <div class="chat-username">
                </div>
                <!-- Messages will be added dynamically with JavaScript -->
            </div>
        </div> <!-- end of chat screen -->
        <!-- chat input -->
        <div>
            {{-- a form to take in the input from the user --}}
            <form action="{{ route('chat.sendMessage') }}" method="POST" class="chat-input">
                @csrf
                <input type="hidden" name="receiverid" value="">
                <!-- the recepient's user id -->
                <input type="text" name="message" placeholder="Type your message..." autocomplete="off" required>
                <!-- the message -->
                <button type="submit">
                    <i class="fa-solid fa-paper-plane"
                        style="color: #0d133f; font-size:19px; cursor: pointer; border:solid 2px;padding:3px;border-radius:10px;">
                    </i>
                </button> <!-- submit button -->
            </form>
            {{-- @endif --}}
        </div> <!-- end of chat input -->
    </div>

    <script>
        let receivingUser;
        console.log({{ $receiver }});
        // scrolling to the bottom of the screen
        function scrollToBottom() {
            $('.chat-screen').scrollTop($('.chat-screen')[0].scrollHeight);
        }
        //loading the chats from the database
        function loadChats(receiverId) {
            $.ajax({
                url: '/chat/TestNewChat/get-chats-json/' + receiverId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    console.log(receiverId);
                    receivingUser = receiverId;
                    //looping through the data
                    $('.chat-screen').empty();
                    $.each(data, function(key, value) {
                        //checking if the user is the sender
                        if (value.sender_id == {{ Auth::user()->id }}) {
                            // remove message on chat screen
                            //if the user is the sender, the message will be displayed on the right
                            $('.chat-screen').append(
                                '<div class="sent"><p>' + value.message + '</p></div>'
                            );
                        } else {
                            //if the user is the receiver, the message will be displayed on the left
                            $('.chat-screen').append(
                                '<div class="received"><p>' + value.message + '</p></div>'
                            );
                        }
                    });
                    scrollToBottom();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        //load users to chat sidebar
        function loadUsers() {
            $.ajax({
                url: "{{ route('chat.getUsersJSON') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    //looping through the data
                    $.each(data, function(key, value) {
                        // adding users to chat icon
                        $('.chat-icons').append(
                            '<a class="chat-icon" href="/chat/TestNewChat/' + value.user_id +
                            '"><img src="{{ asset('assets/css/c151a2b1-94cb-4c38-af80-c67711b7a7c4.png') }}" alt="Avatar"><div><p>' +
                            value.name + '</p><p class="last-message">' + value.message +
                            '</p></div></a>'
                        );
                    });
                }
            });
        }

        loadUsers();
        // Event listener for chat icons
        $(document).on('click', '.chat-icon', function(e) {
            e.preventDefault();
            //getting the receiver's id
            var receiver_id = $(this).attr('href').split('/')[3];
            loadChats(receiver_id);
        });

        //load chats periodically
        setInterval(function() {
            loadChats(receivingUser);
        }, 1000);

        // //sending a new message
        $('.chat-input').submit(function(e) {
            //preventing the default action
            e.preventDefault();
            //getting the message
            var message = $('input[name=message]').val();
            //getting the receiver's id
            var receiver_id = $('input[name=receiverid]').val();
            //getting the sender's id
            var sender_id = {{ Auth::user()->id }};
            //getting the CSRF token
            var _token = $('input[name=_token]').val();
            //sending the ajax request
            $.ajax({
                url: "/chat/TestNewChat/send/" + receivingUser,
                type: "POST",
                data: {
                    message: message,
                    receiverid: receivingUser,
                    sender_id: sender_id,
                    _token: _token
                },
                dataType: "json",
                success: function() {
                    loadChats(receivingUser);
                    //emptying the input field
                    $('input[name=message]').val('');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            }).fail(function() {
                //displaying an error message
                alert("Oops! Something went wrong!")
            });
        });
    </script>
</body>

</html>
