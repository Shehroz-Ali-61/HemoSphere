<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ------------------------------ */
        /*      CHAT CONTAINER STYLES     */
        /* ------------------------------ */
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .chat-header {
            padding: 15px;
            border-bottom: 2px solid rgba(192, 10, 10, 0.3);
            background: var(--chat-bg);
            position: sticky;
            top: 0;
            z-index: 1;
            display: flex;
            align-items: center;

        }

        .chat-header h1 {
            background: linear-gradient(45deg, #fff 0%, #ff6b6b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }

        /* ------------------------------ */
        /*     PARTICIPANT INFORMATION    */
        /* ------------------------------ */
        .participants-info {
            /* justify-content: space-evenly; */
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .participant-info {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 0.1rem;
            gap: 5px;
            border-radius: 10px;
            transition: transform 0.3s ease;
            /* background: rgba(255, 255, 255, 0.05); */
        }


        .participant-info:hover {
            transform: translateY(-5px);
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--primary-color);
            object-fit: cover;
        }

        .participant-name {
            font-size: 1.2rem;
            font-weight: 200;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .participant-info h3 {
            color: var(--white);
            font-weight: 500;
            margin: 0;
        }



        /* ------------------------------ */
        /*       MESSAGE CONTAINER       */
        /* ------------------------------ */
        .chat-main {
            position: relative;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            /* min-height: 60vh; */
            min-height: calc(100vh - 87px);
            display: flex;
            flex-direction: column;
        }

        .message-area {
            flex: 1;
            padding: 1rem;
            overflow-y: auto;
            scroll-behavior: smooth;
        }

        .message {
            margin-bottom: 1rem;
            max-width: 65%;
            padding: 0.8rem;
            border-radius: 15px;
            position: relative;
            animation: messageSlide 0.3s ease;
            word-break: break-word;
        }

        .sent {
            background: rgba(192, 10, 10, 0.3);
            margin-left: auto;
            border: 1px solid #c00a0a;
        }

        .received {
            background: rgba(255, 255, 255, 0.05);
            margin-right: auto;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .message-content {
            color: #fff;
            font-size: 0.95rem;
            line-height: 0.8;
        }

        .message-time {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 0.5rem;
            text-align: right;
        }

        /* ------------------------------ */
        /*      MESSAGE INPUT STYLES      */
        /* ------------------------------ */
        .message-input {
            padding: 1rem;
            border-top: 2px solid rgba(255, 255, 255, 0.1);
        }

        .input-group {
            display: flex;
            gap: 1rem;
        }

        #messageInput {
            flex: 1;
            padding: 0.3rem;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: #fff;
            resize: none;
            min-height: 40px;
            transition: all 0.3s ease;
        }

        #messageInput:focus {
            border-color: #c00a0a;
            box-shadow: 0 0 0 3px rgba(192, 10, 10, 0.2);
            outline: none;
        }

        .send-btn {
            padding: 0.75rem 1rem;
            background: #c00a0a;
            border: none;
            border-radius: 8px;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .send-btn:hover {
            background: #a00808;
            transform: translateY(-2px);
        }

        .mobile-menu {
            display: none;
            position: fixed;
            bottom: 90px;
            right: 30px;
            background: var(--primary-color);
            color: white;
            padding: 12px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 100;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* ------------------------------ */
        /*       RESPONSIVE DESIGN        */
        /* ------------------------------ */
        @media (max-width: 768px) {
            .participants-info {
                grid-template-columns: repeat(auto-fit, minmax(150px, 0.2fr));
                gap: 0.5rem;
            }

            .participant-info {
                padding: 0rem;
            }

            .profile-img {
                width: 50px;
                height: 50px;
            }

            .message {
                max-width: 80%;
            }

            .chat-main {
                max-height: 77.2vh;
                min-height: calc(100vh - 76px);
            }

            .mobile-menu {
                display: block;
            }

            .input-group {
                /* flex-direction: column; */
            }

            .send-btn {
                width: 20%;
                justify-content: center;
            }
        }


        @media (max-width: 480px) {
            .participant-info {
                gap: 0.75rem;
            }

            .participant-name {
                font-size: 0.85rem;
            }

        }

        @keyframes messageSlide {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>


{{-- Html --}}

<body>
    @yield('content')
</body>



{{-- JS Chat --}}
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    function autoResize(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    }

    const pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
        cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
        encrypted: true
    });

    const userIds = [{{ auth()->id() }}, {{ $user->id }}].sort();
    const channelName = `chat.${userIds[0]}.${userIds[1]}`;
    const channel = pusher.subscribe(channelName);

    channel.bind('message', function (data) {
        const message = data.message;
        const isSent = message.sender_id == {{ auth()->id() }};
        const messageArea = document.getElementById('messageArea');

        const messageElement = document.createElement('div');
        messageElement.className = `message ${isSent ? 'sent' : 'received'}`;
        messageElement.innerHTML = `
            <div class="message-content">${message.message}</div>
            <div class="message-time">
                ${new Date(message.created_at).toLocaleString('en-US', {
            month: 'short',
            day: 'numeric',
            hour: 'numeric',
            minute: '2-digit'
        })}
            </div>
        `;

        messageArea.appendChild(messageElement);
        messageArea.scrollTop = messageArea.scrollHeight;
    });

    document.getElementById('chatForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const messageInput = document.getElementById('messageInput');
        const sendBtn = document.querySelector('.send-btn');

        try {
            sendBtn.disabled = true;
            sendBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';

            await fetch("{{ route('chat.send', $user->id) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: messageInput.value })
            });

            messageInput.value = '';
            messageInput.style.height = 'auto';
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to send message. Please try again.');
        } finally {
            sendBtn.disabled = false;
            sendBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Send';
        }
    });

    window.addEventListener('DOMContentLoaded', () => {
        const messageArea = document.getElementById('messageArea');
        messageArea.scrollTop = messageArea.scrollHeight;
    });


    
    // Mobile Menu Toggle
    const mobileMenu = document.querySelector('.mobile-menu');
    const leftPanel = document.querySelector('.left-panel');

    mobileMenu.addEventListener('click', () => {
        leftPanel.classList.toggle('active');
    });

    // Close panel when clicking outside
    document.addEventListener('click', (e) => {
        if (window.innerWidth > 768) return;
        if (!leftPanel.contains(e.target) && !mobileMenu.contains(e.target)) {
            leftPanel.classList.remove('active');
        }
    });

    // Close panel on window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            leftPanel.classList.remove('active');
        }
    });
</script>

</html>