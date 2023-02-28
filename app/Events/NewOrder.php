<?php

namespace App\Events;

use App\Models\ApiKey;
use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewOrder implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $api_key;
    public $order;
    public $time;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        //
        $this->api_key = ApiKey::getApiByKey('admin_broadcast','admin');
        $this->order = $order;
        $this->time = date("H Y-m-d") == date("H Y-m-d",strtotime($order->created_at)) ? "Just now" : date("H:i , d M",strtotime($order->created_at));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('orders.admin');
    }
    public function broadcastWith()
    {
        return ['order' => $this->order, "time" => $this->time];
    }
}
