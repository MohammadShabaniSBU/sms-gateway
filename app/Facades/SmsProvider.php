<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string getProvider()
 */
class SmsProvider extends Facade {
    public static function getFacadeAccessor() 
    {
        return 'sms-provider';
    }
}