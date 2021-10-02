<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
    //
    protected $fillable = [
        'room_number->enabled',
        'roomtype_id->enabled',
        'branch_id->enabled',        
    ];
}
