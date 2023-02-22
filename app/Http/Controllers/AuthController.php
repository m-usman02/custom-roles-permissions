<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        
        $data = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        
        if(Auth::attempt($data)){
            $reponse = ["success"=>true,"message" => "Loged in Successfully !!"];          
        }else{
            $reponse = ["success"=>false,"message" => "Invalid User !!"];           
        }

        return response()->json($reponse);
    }
}
