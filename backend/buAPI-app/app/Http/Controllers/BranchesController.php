<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchesController extends Controller
{
    //
    protected $fillable = [
        'branchtype_id->enabled',
        'name->enabled',
        'address->enabled',
        'phone->enabled',
        'description->enabled',
    ];
}
