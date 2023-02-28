<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class sendChat implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    private $message;
    public $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message = null)
    {
        //
        $this->message = $message;
        $this->time = date("H:i");
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat');
    }
    public function broadcastWith()
    {
        return ['message' => $this->message, "time" => $this->time];
    }
}
