<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\NewMessage;

class Message extends Model
{
    //
    protected $fillable = ['sender_id', 'receiver_id', 'message', 'read'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    protected $dispatchesEvents = [
        'created' => NewMessage::class,
    ];
}
