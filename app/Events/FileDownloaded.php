<?php

namespace App\Events;

use App\Models\File;
use GuzzleHttp\Psr7\Request;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FileDownloaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */



     public $file;
     public $userAgent;
     public $ipAddress;
     public $country;
     public $downloaded_time;

     public function __construct($file, $userAgent, $ipAddress,$country,$downloaded_time)
     {
         $this->file = $file;
         $this->userAgent = $userAgent;
         $this->ipAddress = $ipAddress;
         $this->country=$country;
         $this->downloaded_time=$downloaded_time;
     }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('File-downloaded'),
        ];
    }
}
