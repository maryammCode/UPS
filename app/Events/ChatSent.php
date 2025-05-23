<?php

namespace App\Events;

use App\Chat;
use App\Models\User;
use App\Notification;
use App\UserChat;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public UserChat $receiver;
    public User $sender;
    public string $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(UserChat $receiver, string $message,User $sender )
    {
        $this->receiver = $receiver;
        $this->sender = $sender;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn(): array
    {
        return[
            new Channel('chat'.$this->receiver->user_id ),
        ];
    }

    public function broadcastAs()
    {
        return 'chatMessage';
    }

}
