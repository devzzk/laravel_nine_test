<?php

namespace App\Events;

use App\Models\Chirp;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChirpCreated
{
    use Dispatchable;

    public $chirp;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Chirp $chirp)
    {
        $this->chirp = Chirp::with('user:id,name')->find($chirp->id)->toArray();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [
            'chirps'
        ];
    }

    public function broadcastAs()
    {
        return 'message.received';
    }

    public function getData()
    {
        return $this->chirp;
    }
}
