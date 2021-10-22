<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{
    public function all(){
        $res = [
            'ok' => true,
            'message' => ''
        ];

        try{
            $departments = Department::select(['id', 'name'])->orderBy('name', 'asc')->get();
            $res['data'] = $departments;
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $res;
    }
}
