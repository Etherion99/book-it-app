<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\BranchesController;


Route::group([
    'prefix' => 'auth'
], function (){
    Route::post('singup', [AuthController::class, 'signup']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::post('branch/create',[AuthController::class, 'newBranch']);

Route::post('room/create',[AuthController::class, 'newRoom']);


