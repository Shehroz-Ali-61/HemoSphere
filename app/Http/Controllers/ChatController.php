<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class ChatController extends Controller
{
    public function show(User $user)
    {
        abort_unless(User::where('id', $user->id)->exists(), 404);

        $messages = Message::with(['sender', 'receiver'])
            ->where(function ($query) use ($user) {
                $query->where('sender_id', auth()->id())
                      ->where('receiver_id', $user->id);
            })
            ->orWhere(function ($query) use ($user) {
                $query->where('sender_id', $user->id)
                      ->where('receiver_id', auth()->id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        $chattedUsers = Message::where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->with('sender', 'receiver')
            ->get()
            ->pluck('receiver')
            ->merge(
                Message::where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id())
                    ->with('sender', 'receiver')
                    ->get()
                    ->pluck('sender')
            )
            ->unique('id');

        return view('chat.show', compact('user', 'messages', 'chattedUsers'));
    }

    public function send(Request $request, User $user)
    {
        $request->validate(['message' => 'required|string|max:500']);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user->id,
            'message' => $request->message
        ]);

        return response()->json(['status' => 'Message sent!']);
    }
}
