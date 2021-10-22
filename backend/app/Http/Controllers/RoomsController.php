<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Branch;
use App\Models\Room;
use App\Models\Booking;

use Carbon\Carbon;

class RoomsController extends Controller
{
    public function create(Request $request){
        $data = $request->all(); 

        $res = [
            'ok' => true,
            'message' => ''
        ];

        try{
            Room::create($data);
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $res;
    }
    
    public function findByCity($city){
        $res = [
            'ok' => true,
            'message' => ''
        ];

        try{
            $rooms = Room::whereHas('branch', function($q) use($city){
                $q->where('city_id', $city);            
            })->with(['branch', 'branch.hotel'])->limit(5)->get();

            $res['data'] = $rooms;
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
            $rooms = Room::whereHas('branch.hotel.user', function($q) use($user){
                $q->where('id', $user);            
            })->with(['branch', 'branch.hotel', 'branch.hotel.user', 'roomtype'])->limit(5)->get();

            $res['data'] = $rooms;
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $res;
    }

    public function book(Request $request){
        $data = $request->all();

        $res = [
            'ok' => true,
            'message' => ''
        ];

        try{
            $start = Carbon::parse($data['date']);
            $end = Carbon::parse($data['end']);

            $data = [
                'date' => $data['date'],
                'hour' => '13:00:00',
                'time' => $end->diffInDays($start),
                'user_id' => $data['user'],
                'room_id' => $data['room'],
                'total_cost' => $end->diffInDays($start) * $data['cost']
            ];

            $booking = Booking::create($data);            
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
            Room::destroy($id);           
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $res;
    }
}
