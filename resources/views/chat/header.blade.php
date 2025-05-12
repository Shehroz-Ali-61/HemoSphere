{{-- @extends('layouts.mainStructure')

@section('title', 'Chat | HemoSphere')

@section('content')
<style>
    .chat-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    }

    .chat-header {
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 1rem;
        margin-bottom: 2rem;
    }

    .participants-info {
        display: flex;
        gap: 2rem;
        margin-bottom: 1.5rem;
        justify-content: center;
    }

    .participant-info {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .participant-label {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .participant-name {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .profile-img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .chat-main {
        background: white;
        padding: 20px;
        border-radius: 8px;
        min-height: 400px;
    }
</style>

<div class="chat-container">
    <div class="chat-header">
        <h1>Chat Session</h1>

        <div class="participants-info">
            <!-- Logged-in User (from users table) -->
            <div class="participant-info">
                <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/profile-pic.png') }}"
                    alt="Your Profile Picture" class="profile-img">
                <div class="participant-label">Logged in as:</div>
                <div class="participant-name">
                    {{ Auth::user()->name }}
                    <i class="fas fa-user text-primary"></i>
                </div>
            </div>

            <!-- Donor (from donors table) -->
            <div class="participant-info">
                <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/profile-pic.png') }}"
                    alt="{{ $user->name }}'s Profile Picture" class="profile-img">
                <div class="participant-label">Chatting with user:</div>
                <div class="participant-name">
                    {{ $user->name }}
                    <i class="fas fa-hand-holding-medical text-danger"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="chat-main">
        <!-- Chat messages will go here -->
        <div class="message-area" id="messageArea">
            <!-- Messages will be displayed here -->
            @foreach($messages as $message)
            <div class="message @if($message->sender_id == auth()->id()) sent @else received @endif">
                <div class="message-content">{{ $message->message }}</div>
                <div class="message-time">{{ $message->created_at->format('h:i A') }}</div>
            </div>
            @endforeach
        </div>
        <form id="chatForm" class="message-input">
            @csrf
            <div class="input-group">
                <textarea id="messageInput" class="form-control" placeholder="Type your message..." required></textarea>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-paper-plane"></i> Send
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .message-area {
        height: 400px;
        overflow-y: auto;
        padding: 15px;
        background: #fff;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .message {
        margin-bottom: 15px;
        max-width: 70%;
        padding: 10px 15px;
        border-radius: 15px;
    }

    .sent {
        background: rgb(122, 136, 138);
        margin-left: auto;
    }

    .received {
        background: rgb(104, 93, 94);
        margin-right: auto;
    }

    .message-time {
        font-size: 0.75rem;
        color: rgb(0, 0, 0);
        text-align: right;
    }
</style>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    const pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
        cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
        encrypted: true
    });

    //
    // In your Blade template's JavaScript
    const userIds = [{{ auth()-> id() }}, { { $user -> id } }].sort();
    const channelName = `chat.${userIds[0]}.${userIds[1]}`;
    const channel = pusher.subscribe(channelName);

    // Change channel name to use user IDs
    channel.bind('message', function (data) {
        const message = data.message; // The message data received from the event
        const isSent = message.sender_id == {{ auth() -> id()
    }};
    const messageArea = document.getElementById('messageArea');

    // Convert the ISO 8601 formatted string to a Date object
    const time = new Date(message.created_at).toLocaleTimeString(); // Converts to a readable time string

    // Append the message to the chat
    messageArea.innerHTML += `
        <div class="message ${isSent ? 'sent' : 'received'}">
            <div class="message-content">${message.message}</div>
            <div class="message-time">${time}</div>
        </div>
    `;

    // Scroll to the bottom of the chat area
    messageArea.scrollTop = messageArea.scrollHeight;   
        });


    document.getElementById('chatForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const message = document.getElementById('messageInput').value;

        fetch("{{ route('chat.send', $user->id) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message: message })
        })
            .then(() => {
                document.getElementById('messageInput').value = '';
            });
    });
</script>
@endsection --}}

















<!-- resources/views/chat/header.blade.php -->
<div class="chat-header">
    <div class="participant-info">
        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/profile-pic.png') }}"
            class="profile-img" alt="{{ $user->name }}'s profile">
        <h3>{{ $user->name }}</h3>
    </div>
</div>