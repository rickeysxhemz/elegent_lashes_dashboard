<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Pusher\Pusher;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $message, $userId;

    /**
     * Create a new job instance.
     */
    public function __construct($message, $userId)
    {
        $this->message = $message;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $options = [
            'cluster' => config('broadcasting.connections.pusher.options.cluster'),
            'useTLS' => true,
        ];

        $pusher = new \Pusher\Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            $options
        );

        $data['message'] = $this->message;
        $channel_name = 'notify-channel-' . $this->userId;
        $event_name = 'notify-event-' . $this->userId;
        $pusher->trigger($channel_name, $event_name, $data);
    }
}
