<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Hotel;

class BranchesController extends Controller
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
            $hotelId = Hotel::whereHas('user', function($q) use($user){
                $q->where('id', $user);            
            })->with(['user'])->first()->id;

            $data['hotel_id'] = $hotelId;

            Branch::create($data);
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $res;
    }

    public function findByAdmin($user){
        $res = [
            'ok' => true,
            'message' => ''
        ];

        try{
            $rooms = Branch::whereHas('hotel.user', function($q) use($user){
                $q->where('id', $user);            
            })->with(['hotel', 'hotel.user', 'city'])->limit(5)->get();

            $res['data'] = $rooms;
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $res;
    }

    public function delete($id){
        $res = [
            'ok' => true,
            'message' => ''
        ];

        try{
            Branch::destroy($id);           
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $res;
    }
}
