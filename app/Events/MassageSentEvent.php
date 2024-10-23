<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MassageSentEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $userName;
    public $roomId;
    public $message;
    public function __construct(string $userName,int $roomId,string $message)
    {
        $this->userName = $userName;
        $this->roomId = $roomId;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {

        // Log::info('Broadcasting on channel: ', ['channel' => 'chat.' . $this->roomId. $this->message]);
        return [
            new Channel('chat.' . $this->roomId)
        ];

    }

    public function broadcastWith()
    {
        return [
            'userName' => $this->userName,
            'message' => $this->message,
        ];
    }
}
