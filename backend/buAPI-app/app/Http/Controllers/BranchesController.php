<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchesController extends Controller
{
    //
    public function newBranch(Request $resquest){
        $data = $request->all();  

        Branch::create($data);

        return [
            'ok' => true,
            'message' => 'Successfully created branch!'
        ];
    }
}
