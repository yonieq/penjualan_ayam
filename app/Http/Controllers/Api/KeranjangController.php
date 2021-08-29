<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Keranjang;
use GuzzleHttp\Promise\Create;

class KeranjangController extends Controller
{
    //
    public function get($id)
    {
        $data = Keranjang::join('products', 'products.id', '=', 'keranjang.products_id')
            ->where("keranjang.user_id", $id)
            ->get([
                "products.name",
                "products.price",
                "keranjang.id",
                "keranjang.qty",
                "products.image",
            ]);
        return response([
            'status' => 'OK',
            'message' => 'List Product',
            'data' => $data
        ], 200);
    }

    public function post(Request $request, $id)
    {
        $data = new Keranjang();
        $data->products_id = $request->products_id;
        $data->qty = $request->qty;
        $data->user_id = $id;
        $data->save();
        return response([
            'status' => true,
            'message' => 'Berhasil menambahkan ke keranjang',
            'data' => [$data]
        ], 200);
    }
    public function tambah($id)
    {
        $qty = Keranjang::where('id',$id)->first('qty')->qty;

        $keranjang = Keranjang::findOrFail($id);
        $keranjang->qty = $qty+1;
        $keranjang->save();

        return response([
            'status' => 'OK',
            'pesan' => 'Jumlah dtambahkan',
            'data' => $keranjang
        ], 200);
    }
    public function kurang($id)
    {
        $qty = Keranjang::where('id',$id)->first('qty')->qty;
        if ($qty==1) {
            return response([
                'status' => 'OK',
                'pesan' => 'Jumlah mencapai batas minimal'
            ], 200);
        }
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->qty = $qty-1;
        $keranjang->save();

        return response([
            'status' => 'OK',
            'pesan' => 'Jumlah dikurangi',
            'data' => $keranjang
        ], 200);
    }
    
    public function delete($id)
    {

        Keranjang::destroy($id);
        
        return response([
            'status' => 'OK',
            'message' => 'Berhasil dihapus'
        ], 200);
    }
}
