<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\User;

class HotelsController extends Controller
{
   public function create(Request $request){
    $data = $request->all();
    $user = $data['user'];
    unset($data['user']);

    $res = [
        'ok' => true,
        'message' => ''
    ];

    try{
        $hotel = Hotel::create($data);
        User::where('id', $user)->update(['hotel_id' => $hotel->id]);
    }catch(\Illuminate\Database\QueryException $e){
        $res = [
            'ok' => false,
            'message' => $e->getMessage()
        ];
    }
    
    return $res;
   }
}
