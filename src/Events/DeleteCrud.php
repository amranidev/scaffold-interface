<?php

namespace Amranidev\ScaffoldInterface\Events;

use Amranidev\ScaffoldInterface\Models\Scaffoldinterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeleteCrud
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Scaffoldinterface.
     */
    public $scaffold;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Scaffoldinterface $scaffold)
    {
        $this->scaffold = $scaffold;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
