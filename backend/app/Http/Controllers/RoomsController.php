<?php

namespace App\Http\Controllers;
use App\Models\Room;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function newRoom(Request $resquest){
        $data = $request->all();  

        Room::create($data);

        return [
            'ok' => true,
            'message' => 'Successfully created branch!'
        ];
    }
    
}
