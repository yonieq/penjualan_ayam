<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //

    public function login(Request $request ){
        $user = User::where('email', $request->email)->first();
        if ($user) {

            if (password_verify($request->password, $user->password)) {
                return response()->json([
                    'status'=>true,
                    'pesan'=>'success',
                    'dataLogin'=>$user
                ]);
            }
            return $this->error('Kata Sandi Salah');
        }
        return $this->error('Email Tidak Terdaftar');
    }
    public function error($pesan){
        return response()->json([
            'status'=>false,
            'pesan'=>$pesan
        ]);
    }
}
