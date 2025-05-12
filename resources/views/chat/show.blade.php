@extends('layouts.chatOnly')

@section('title', 'Chat | HemoSphere')

@section('content')
    <style>
        :root {
            --primary-color: #c00a0a;
            --background-color: #0a0a1a;
            --white: rgba(255, 255, 255, 0.9);
            --border-color: rgba(255, 255, 255, 0.1);
            --hover-bg: rgba(255, 255, 255, 0.05);
            --chat-bg: rgba(10, 10, 26, 0.95);
        }

        /* Container for the split interface */
        .split-view {
            display: flex;
            height: 100vh;
            background: var(--chat-bg);
            /* background: linear-gradient(135deg,
                        #1B1B38 0%,
                        #3C0E0E 50%,
                        #641A1A 100%); */
        }

        /* Left panel for the recipients list (chat list) */
        .left-panel {
            width: 30%;
            border-right: 1px solid var(--border-color);
            background: var(--chat-bg);
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* Right panel for the messages area */
        .right-panel {
            width: 70%;
            display: flex;
            flex-direction: column;
            /* height: 100%; */
        }

        /* Styling for header in the right panel */
        .chat-header {
            padding: 15px;
            border-bottom: 2px solid rgba(192, 10, 10, 0.3);
            background: var(--chat-bg);
        }

        /* Styling for the messages area */
        .chat-main {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .message-area {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
            /* background: var(--background-color); */
            background: linear-gradient(135deg,
                    #1B1B38 0%,
                    #3C0E0E 50%,
                    #641A1A 100%);
        }

        .message-input {
            padding: 10px;
            border-top: 2px solid var(--border-color);
            background: var(--chat-bg);
        }


        /* Mobile Menu Toggle for Chat List */
        @media (max-width: 768px) {
            .left-panel {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                width: 80%;
                max-width: 350px;
                z-index: 1000;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
            }

            .left-panel.active {
                transform: translateX(0);
            }

            .right-panel {
                width: 100%;
            }

            .mobile-menu {
                display: block;
            }
        }
    </style>

    <div class="split-view">
        <!-- Left Panel: List of chat recipients -->
        <div class="left-panel">
            @include('chat.recipients')
        </div>

        <!-- Right Panel: Header (recipient only) and chat conversation -->
        <div class="right-panel">
            @include('chat.header')
            @include('chat.messages')
        </div>
    </div>

    <script>
        
    </script>
@endsection

