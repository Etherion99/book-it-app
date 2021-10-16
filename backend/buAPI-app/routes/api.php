<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelsController;


Route::group([
    'prefix' => 'auth'
], function (){
    Route::post('singup', [AuthController::class, 'signup']);
    Route::post('login', [AuthController::class, 'login']);
});




