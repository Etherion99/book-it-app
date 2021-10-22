<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

            $user = User::create($data);

            $res['id'] = $user->id;
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }

        return $res;
    }   
    
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $res = [
            'ok' => true,
            'message' => ''
        ];

        $user = User::where('email', $email)->first();
        
        if($user != null){
            if (!Hash::check($password, $user->password)){
                $res = [
                    'ok' => false,
                    'message' => 'Contraseña incorrecta'
                ];
            }else{
                $res['id'] = $user->id;
            }
        }else{
            $res = [
                'ok' => false,
                'message' => 'Correo incorrecto'
            ];
        }        

        return $res;
    }
}
