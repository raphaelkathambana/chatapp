
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

      .chat-input button {
        background-color: #333;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="chat-container">
      <div class="chat-header">
        <h1>Chat App</h1>
      </div>
      <div class="chat-messages">
        <!-- Messages will be added dynamically with JavaScript -->
      </div>
      <div class="chat-input">
        <input type="text" placeholder="Type your message...">
        <button>Send</button>
      </div>
    </div>
  </body>
</html>
