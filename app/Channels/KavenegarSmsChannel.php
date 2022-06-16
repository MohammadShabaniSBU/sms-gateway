<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Kavenegar\Exceptions\BaseRuntimeException;
use Kavenegar\Laravel\Facade as Kavenegar;

class KavenegarSmsChannel {
    public function send($notifiable, Notification $notification)
    {
        try {
            $response = Kavenegar::Send(
                config('kavenegar.number'), 
                $notifiable->phone,
                $notification->toArray($notifiable)['content']
            )[0];       

            $notifiable->update([
                'external_id' => $response->messageid,
                'status' => $response->status,
                'status_message' => $response->statustext,
            ]);

        } catch (BaseRuntimeException $e) {
            $notifiable->update([
                'status' => -1,
                'status_message' => $e->errorMessage(),
            ]);
        }
    }
}