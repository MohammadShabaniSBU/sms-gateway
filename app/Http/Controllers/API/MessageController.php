<?php

namespace App\Http\Controllers\API;

use App\Facades\SmsProvider;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendSmsRequest;
use App\Models\Message;
use App\Notifications\SmsNotification;

class MessageController extends Controller
{
    public function send(SendSmsRequest $request)
    {
        $message = Message::create([
            'provider' => SmsProvider::getProvider(),
            ...$request->only('phone', 'content')
        ]);

        $message->notify(new SmsNotification($request->content)); 

        return response()->json([
            'message_id' => $message->id,
        ]);
    }

    public function status(Message $message)
    {
        return response()->json([
            'status' => $message->status_message,
        ]);
    }
}
