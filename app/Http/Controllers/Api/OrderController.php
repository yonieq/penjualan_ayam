<?php

namespace App\Http\Controllers\Api;

use App\Alamat;
use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function get($id)
    {
        // $user_id = \Auth::user()->id;

        $order = DB::table('order')
            ->join('status_order', 'status_order.id', '=', 'order.status_order_id')
            ->select('order.*', 'status_order.name as status_name' )
            ->where('order.status_order_id', 1)
            ->where('order.user_id', $id)->get();
        $proses = DB::table('order')
            ->join('status_order', 'status_order.id', '=', 'order.status_order_id')
            ->select('order.*', 'status_order.name as status_name')
            ->where('order.status_order_id', '!=', 1)
            ->Where('order.status_order_id', '!=', 5)
            ->Where('order.status_order_id', '!=', 6)
            ->where('order.user_id', $id)->get();
        $histori = DB::table('order')
            ->join('status_order', 'status_order.id', '=', 'order.status_order_id')
            ->select('order.*', 'status_order.name as status_name')
            ->where('order.status_order_id', '!=', 1)
            ->Where('order.status_order_id', '!=', 2)
            ->Where('order.status_order_id', '!=', 3)
            ->Where('order.status_order_id', '!=', 4)
            ->where('order.user_id', $id)->get();
        $data = array(
            'order' => $order,
            'proses' => $proses,
            'histori' => $histori
        );
        return response([
            'status' => 'OK',
            'message' => 'List Pemesanan',
            'data' => $data
        ], 200);
    }

    public function post(Request $request, $id)
    {
        $cekAlamat = Alamat::where('user_id',$id)
                    ->count();

        if ($cekAlamat > 0) {
            $ongkir = Kecamatan::join('alamat', 'alamat.kecamatan_id', '=', 'kecamatan.id')->where("alamat.user_id", $id)->first("kecamatan.ongkir")->ongkir;
            $data = new Order();
            $data->invoice = $request->invoice;
            $data->status_order_id = $request->status_order_id;
            $data->metode_pembayaran = $request->metode_pembayaran;
            $data->ongkir = $ongkir;
            $data->pesan = $request->pesan;
            $data->no_hp = $request->no_hp;
            $data->user_id = $id;
            $data->save();
            return response([
                'status' => 'OK',
                'message' => 'List Order',
                'data' => $data
            ], 200);
        } else {
            return response([
                'status' => 'Error',
                'message' => 'Silahkan Atur Alamat Dulu '
            ], 200);   
        }
    }
}
