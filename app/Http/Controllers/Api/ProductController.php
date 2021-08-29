<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function get()
    {
        $data = Product::join('categories', 'products.categories_id', '=', 'categories.id')
        ->get(['products.id as id','products.name as name','products.description as description',
        'products.image as image','products.price as price','products.weigth as weigth',
        'categories.name as categories','products.stok as stok',]);
        return response([
            'status' => 'OK',
            'message' => 'List Product',
            'data' => $data
        ], 200);
    }
}
