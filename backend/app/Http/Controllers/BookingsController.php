<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

use Carbon\Carbon;

class BookingsController extends Controller
{
    public function history($user){
        $res = [
            'ok' => true,
            'message' => ''
        ];

        try{
            $rooms = Booking::where('user_id', $user)->with(['room', 'room.branch', 'room.branch.hotel'])->orderBy('date', 'asc')->limit(5)->get()->toArray();
        

            $rooms = array_map(function($room){
                $room['remaining'] = Carbon::parse($room['date'])->diffInDays(Carbon::now());
                return $room;
            }, $rooms);

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
            Booking::destroy($id);           
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $res;
    }
}
