<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kabupaten;
use App\Kecamatan;
class PengaturanController extends Controller
{
    public function aturalamat()
    {
        //cek apa alamat toko sudah di set atau belum
        $cek = DB::table('alamat_toko')->count();
        $data['cekalamat'] = $cek;
        //jika belum di setting maka ambil data provinsi untuk di tampilkan di form alamat
        if($cek < 1){
            $data['kabupatens'] = Kabupaten::all();
        }else{
            //jika sudah di setting maka tidak menampilkan form tapi tampilkan data alamat toko
            $data['alamat'] = DB::table('alamat_toko')
                                    ->join('kecamatan','kecamatan.kecamatan_id','=','alamat_toko.kecamatan_id')
                                    ->join('kabupaten','kabupaten.kabupaten_id','=','kecamatan.kabupaten_id')
                                    ->select('alamat_toko.*','kecamatan.title as kota','kabupaten.title as prov')->first();
        }
        return view('admin.pengaturan.alamat',$data);
    }
    public function getCity($id)
    {

        //kfunction untuk mengambil data kota sesuia id parameter
        $kecamatan = Kecamatan::where('kabupaten_id',$id)->get();
        //lalu return dengan format json
        return response()->json($kecamatan); 
    }

    public function ubahalamat($id)
    {
        //function untuk menampilkan form edit alamat
        $data['kabupaten'] = Kabupaten::all();
        $data['kecamatan'] = Kecamatan::all();
        $data['id'] = $id;
        return view('admin.pengaturan.ubahalamat',$data);
    }
    
    public function simpanalamat(Request $request)
    {
        //menyimpan alamat baru pada toko

        DB::table('alamat_toko')->insert([
            'kecamatan_id' => $request->kecamatan_id,
            'detail'  => $request->detail
        ]);

        return redirect()->route('admin.pengaturan.alamat')->with('status','Berhasil Mengatur Alamat');
    }

    public function updatealamat($id,Request $request)
    {

        //mengupdate alamat toko
        DB::table('alamat_toko')
            ->where('id',$id)
            ->update([
            'kecamatan_id' => $request->kecamatan_id,
            'detail'  => $request->detail
        ]);

        return redirect()->route('admin.pengaturan.alamat')->with('status','Berhasil Mengubah Alamat');
    }
}
