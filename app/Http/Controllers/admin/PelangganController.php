<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PelangganController extends Controller
{
    public function index()
    {
        //ambil data pelanggan yang di join dengan table alamat, city,dan province
        $data = array(
            'pelanggan' => DB::table('users')
                        ->join('alamat','alamat.user_id','=','users.id')
                        ->join('kecamatan','kecamatan.kecamatan_id','=','alamat.kecamatan_id')
                        ->join('kabupaten','kabupaten.kabupaten_id','=','kecamatan.kabupaten_id')
                        ->select('users.*','alamat.detail','kecamatan.title as kota','kabupaten.title as prov')
                        ->where('users.role','=','customer')->get()
        );
        return view('admin.pelanggan.index',$data);
    }
}
