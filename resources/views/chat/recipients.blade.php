<!-- resources/views/chat/recipients.blade.php -->
<style>
     .chat-recipients {
          width: 100%;
          padding: 1rem;
          color: var(--white);
     }

     .chat-recipients h2 {
          margin-bottom: 1rem;
          font-size: 1.5rem;
          color: var(--white);
     }

     .chat-recipients ul {
          list-style: none;
          padding: 0;
     }

     .chat-recipients li {
          margin-bottom: 1rem;
          border-bottom: 1px solid var(--border-color);
          padding-bottom: 0.5rem;
     }

     .chat-recipients a {
          text-decoration: none;
          color: var(--white);
          display: flex;
          align-items: center;
          gap: 0.75rem;
          transition: background 0.3s ease;
          padding: 0.5rem;
          border-radius: 4px;
     }

     .chat-recipients a:hover {
          background: var(--hover-bg);
     }

     .profile-img {
          width: 40px;
          height: 40px;
          border-radius: 50%;
          border: 2px solid var(--primary-color);
     }
</style>

<div class="chat-recipients">
     <a href="{{ route('account.dashboard') }}" class="btn btn-secondary">
          <i class="fas fa-arrow-left"></i> Back to Dashboard
     </a>
     <h2>Chats</h2>
     @if($chattedUsers->count() > 0)
           <ul>
                 @foreach($chattedUsers as $recipient)
                      @if($recipient->id !== auth()->id())
                          <li>
                                 <a href="{{ route('chat.show', $recipient->id) }}">
                                          <img src="{{ $recipient->profile_picture ? asset('storage/' . $recipient->profile_picture) : asset('images/profile-pic.png') }}"
                                                  alt="{{ $recipient->name }}'s profile" class="profile-img">
                                          <span class="recipient-name">{{ $recipient->name }}</span>
                                 </a>
                          </li>
                      @endif
                 @endforeach
           </ul>
      @else
           <p>No chats yet.</p>
      @endif
</div>
