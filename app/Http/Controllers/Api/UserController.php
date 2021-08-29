<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function get($id)
    {
        $data = User::where('id',$id)->first();
        return response([
            'status' => 'OK',
            'message' => 'Data User',
            'data' => $data
        ], 200);
    }
}
