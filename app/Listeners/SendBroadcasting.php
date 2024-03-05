<?php

namespace App\Listeners;

use App\Events\ChirpCreated;
use App\Facades\Pusher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBroadcasting implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ChirpCreated $event)
    {
        Pusher::trigger($event->broadcastOn(), $event->broadcastAs(), $event->getData());
    }
}
