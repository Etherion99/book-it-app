<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function signup(Request $request){
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }   
    
    public function login(){
        
    }
}
