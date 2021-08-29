<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;
class CheckoutController extends Controller
{
    public function index()
    {
        //ambil session user id
        $id_user = Auth::user()->id;
        //ambil produk apa saja yang akan dibeli user dari table keranjang
        $keranjangs = DB::table('keranjang')
                            ->join('users','users.id','=','keranjang.user_id')
                            ->join('products','products.id','=','keranjang.products_id')
                            ->select('products.name as nama_produk','products.image','products.weigth','users.name','keranjang.*','products.price')
                            ->where('keranjang.user_id','=',$id_user)
                            ->get();

        //lalu hitung jumlah berat total dari semua produk yang akan di beli
        $berattotal = 0;
        foreach($keranjangs as $k){
            $berat = $k->weigth * $k->qty;
            $berattotal = $berattotal + $berat;
        }
        //lalu ambil id kota si pelanngan
        $kecamatan = DB::table('alamat')->where('user_id',$id_user)->get();
        $city_destination =  $kecamatan[0]->kecamatan_id;
        //ambil id kota toko
        $alamat_toko = DB::table('alamat_toko')->first();

        //lalu hitung ongkirnya
        $ongkir = Kecamatan::join('alamat','alamat.kecamatan_id','=','kecamatan.id')
        ->where("alamat.user_id",$id_user)->first("kecamatan.ongkir")->ongkir;
        
        // dd($cost);
        //ambil hasil nya
        // $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];
        
        //lalu ambil alamat user untuk ditampilkan di view
        $alamat_user = DB::table('alamat')
        ->join('kecamatan','kecamatan.kecamatan_id','=','alamat.kecamatan_id')
        ->join('kabupaten','kabupaten.kabupaten_id','=','kecamatan.kabupaten_id')
        ->select('alamat.*','kecamatan.title as kota','kabupaten.title as prov')
        ->where('alamat.user_id',$id_user)
        ->first();    
        
        //buat kode invoice sesua tanggalbulantahun dan jam
        $data = [
            'invoice' => 'ALV'.Date('Ymdhi'),
            'keranjangs' => $keranjangs,
            'ongkir' => $ongkir,
            'alamat' => $alamat_user
        ];
        return view('user.checkout',$data);
    }
}
