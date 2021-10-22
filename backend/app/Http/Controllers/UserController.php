<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function find($id){
        $res = [
            'ok' => true,
            'message' => ''
        ];

        try{
            $user = User::select(['name', 'lastname', 'email', 'username'])->where('id', $id)->first();
            $res['data'] = $user;
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $res;
    }

    public function update(Request $request){
        $data = $request->all();
        $id = $data['id'];
        unset($data['id']);

        $res = [
            'ok' => true,
            'message' => ''
        ];

        try{
            User::find($id)->update($data);
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $res;
    }

    public function delete(Request $request){
        $id = $request->input('id');

        try{
            User::find($id)->delete();
        }catch(\Illuminate\Database\QueryException $e){
            $res = [
                'ok' => false,
                'message' => $e->getMessage()
            ];
        }

        return $res;
    }
}
