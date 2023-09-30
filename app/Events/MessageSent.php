<?php

namespace App\Events;

use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        protected User $user,
        protected Room $room,
        protected Message $message
    ) {
    }

    /**
     * Get the channels the event should broadcast on.
     *
     */
    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel("room.{$this->room->name}");
    }

    /**
     * Broadcast with specific data.
     *
     */
    public function broadcastWith(): array
    {
        return array_merge(
            $this->message->toArray(),
            [
                'user' => $this->user->only('id', 'name')
            ]
        );
    }
}
