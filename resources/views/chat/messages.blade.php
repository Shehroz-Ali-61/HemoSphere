<!-- resources/views/chat/messages.blade.php -->
<div class="chat-main">
    <div class="message-area" id="messageArea">
        @foreach($messages as $message)
            <div class="message {{ $message->sender_id == auth()->id() ? 'sent' : 'received' }}">
                <div class="message-content">{{ $message->message }}</div>
                <div class="message-time">
                    {{ $message->created_at->format('M j, h:i A') }}
                </div>
            </div>
        @endforeach
    </div>

    <form id="chatForm" class="message-input" method="POST" action="{{ route('chat.send', $user->id) }}">
        @csrf
        <div class="input-group">
            <textarea id="messageInput" name="message" placeholder="Type your message..." required rows="1"
                oninput="autoResize(this)"></textarea>
            <button type="submit" class="send-btn">
                <i class="fas fa-paper-plane"></i>
                <span class="btn-text">Send</span>
            </button>
            <div class="mobile-menu">💬</div>

        </div>
    </form>
</div>