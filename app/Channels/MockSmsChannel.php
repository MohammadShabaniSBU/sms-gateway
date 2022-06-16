<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;

class MockSmsChannel {

    public function send($notifiable, Notification $notification)
    {
        info(
            sprintf("sms sent to %s with content: %s",
                $notifiable->phone,
                $notification->toArray($notifiable)['content'],
            )
        );

        $notifiable->update([
            'status_message' => 'it is a fake message sent🙂'
        ]);
    }
}