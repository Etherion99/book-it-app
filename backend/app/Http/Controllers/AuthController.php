<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function signup(Request $request){
        $res = [
            'ok' => true,
            'message' => ''
        ];

        try{
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);

            User::create($data);
        }catch(\Illuminate\Database\QueryException $e){
            $res['ok'] = false;
            $res['message'] = $e->getMessage();
        }

        return $res;
    }   
    
    public function login(){
        
    }
}
