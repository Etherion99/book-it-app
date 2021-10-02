<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelsController extends Controller
{
    protected $fillable = [
        'name->enabled',
        'web_page->enabled',
        'nit->enabled',        
    ];
}
