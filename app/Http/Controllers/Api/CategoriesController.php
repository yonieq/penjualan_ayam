<?php

namespace App\Http\Controllers\Api;

use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function get()
    {
        $data = Categories::all();
        return response([
            'status' => 'OK',
            'message' => 'List Kategori',
            'data' => $data
        ], 200);
    }
}
