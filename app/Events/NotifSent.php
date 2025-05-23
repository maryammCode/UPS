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
use TCG\Voyager\Facades\Voyager;

class NotifSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $receiver;
    public Notification $notif;

    public User $sender;
    public string $message;

    public string $user_name;
    public string $avatar;
    public string $date;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $receiver, string $message,User $sender, Notification $notif)
    {
        $this->receiver = $receiver;
        $this->sender = $sender;
        $this->message = $message;
        $this->notif = $notif;
        $this->user_name = $sender->entreprise_id ? $sender->company->designation : $sender->name;
        $this->avatar =Voyager::image( $sender->entreprise_id ? $sender->company->logo : $sender->avatar);
        $this->date =$notif->created_at->diffForHumans();

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn(): array
    {
        return[
            new Channel('notif'.$this->receiver ),
        ];
    }

    public function broadcastAs()
    {
        return 'notifMessage';
    }

}
