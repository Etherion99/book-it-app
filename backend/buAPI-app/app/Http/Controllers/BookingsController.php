<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingsController extends Controller
{
    //
    protected $fillable = [
        'date->enabled',
        'hour->enabled',
        'time->enabled',
        'user_id->enabled',
        'room_id->enabled',
    ];
}
