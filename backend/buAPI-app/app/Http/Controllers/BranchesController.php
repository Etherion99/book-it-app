<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branches;

class BranchesController extends Controller
{
    //
    public function newBranch(Request $resquest){
        $data = $request->all();  

        branches::create($data);

        return [
            'ok' => true,
            'message' => 'Successfully created branch!'
        ];
    }
}
