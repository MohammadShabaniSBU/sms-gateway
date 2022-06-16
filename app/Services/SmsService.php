<?php

namespace App\Services;

use App\Channels\MockSmsChannel;

/**
 * this class will choose the provider
 */
class SmsService {
    public function getProvider() : string
    {
        return MockSmsChannel::class;
    }
}