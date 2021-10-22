<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function findByDpt($department){
        $res = [
            'ok' => true,
            'message' => ''
        ];

        try{
            $cities = City::select(['id', 'name'])->where('department_id', $department)->orderBy('name', 'asc')->get();
            $res['data'] = $cities;
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $res;
    }
}
