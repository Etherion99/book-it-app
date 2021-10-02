<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    protected $fillable = [
        'name->enabled',
        'lastname->enabled',
        'email->enabled',        
        'username->enabled',  
        'password->enabled',  
        'city_id->enabled',
        'document->enabled',    
        'gender->enabled',  
        'hotel_id->enabled',          
    ];
}
