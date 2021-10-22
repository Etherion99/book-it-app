<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\BookingsController;

Route::group(['prefix' => 'auth'], function (){
    Route::post('singup', [AuthController::class, 'signup']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::group(['prefix' => 'user'], function (){
    Route::get('find/{id}', [UserController::class, 'find']);
    Route::post('update', [UserController::class, 'update']);
    Route::post('delete', [CityController::class, 'delete']);
});

Route::group(['prefix' => 'department'], function (){
    Route::get('all', [DepartmentsController::class, 'all']);
});

Route::group(['prefix' => 'city'], function (){
    Route::get('find_by_dpt/{department}', [CityController::class, 'findByDpt']);
});

Route::group(['prefix' => 'room'], function (){
    Route::get('find_by_city/{city}', [RoomsController::class, 'findByCity']);
    Route::get('find_by_admin/{user}', [RoomsController::class, 'findByAdmin']);
    Route::post('book', [RoomsController::class, 'book']);
    Route::delete('delete/{id}', [RoomsController::class, 'delete']);
    Route::post('create', [RoomsController::class, 'create']);
});

Route::group(['prefix' => 'branch'], function (){
    Route::get('find_by_admin/{user}', [BranchesController::class, 'findByAdmin']);
    Route::delete('delete/{id}', [BranchesController::class, 'delete']);
    Route::post('create', [BranchesController::class, 'create']);
});

Route::group(['prefix' => 'book'], function (){
    Route::get('history/{user}', [BookingsController::class, 'history']);
});

Route::group(['prefix' => 'hotel'], function (){
    Route::post('create', [HotelsController::class, 'create']);
});


