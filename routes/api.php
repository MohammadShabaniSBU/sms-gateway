<?php

use App\Http\Controllers\API\MessageController;
use Illuminate\Support\Facades\Route;

Route::controller(MessageController::class)->group(function() {
    Route::post('messages', 'send');
    Route::get('messages/{message}', 'status');
});