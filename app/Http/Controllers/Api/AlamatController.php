<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kabupaten;
use App\Kecamatan;
use App\Alamat;
use Auth;
use Illuminate\Support\Facades\DB;

class AlamatController extends Controller
{
    //
    public function get($id)
    {
        //ambil session id user
        $id_user = $id;
        //ambil data alamat
        $cekAlamat = Alamat::where('user_id',$id_user)
                    ->count();
        //cek jika user sudah mengatur alamat maka jalankan ini
        if($cekAlamat >0){
            $data = DB::table('alamat')
            ->join('kecamatan','kecamatan.kecamatan_id','=','alamat.kecamatan_id')
            ->join('kabupaten','kabupaten.kabupaten_id','=','kecamatan.kabupaten_id')
            ->select('kabupaten.title as kabupaten','kecamatan.title as kecamatan','alamat.*')
            ->where('alamat.user_id',$id_user)
            ->first();
            // return view('user.alamatada',$data);
            return response([
                'status' => 'OK',
                'message' => 'Alamat Anda',
                'data' => $data
            ], 200);

        }else{
            //jika belum maka tampilkan form untuk mengatur alamat
            return response([
                'status' => 'Error',
                'message' => 'Silahkan Atur Dulu ',
            ], 200);            
        }
        
    }

    public function post(Request $request, $id){
        $kecamatan_id = Kecamatan::where('title',$request->kecamatan)->first('id')->id;
        $data = new Alamat;
        $data->kecamatan_id = $kecamatan_id;
        $data->detail = $request->detail;
        $data->user_id =$id;
        $data->save();
        return response([
            'status' => 'OK',
            'message' => 'Alamat Anda',
            'data' => $data
        ], 200);
    }

    public function ubah($id)
    {
        //menampilkan form edit alamat
        $data = Alamat::join('kecamatan','kecamatan.id','=','alamat.kecamatan_id')->where('alamat.user_id',$id)->first(['alamat.id', 'alamat.detail','kecamatan.title as kecamatan']);
        return response([
            'status' => 'OK',
            'message' => 'Alamat Anda',
            'data' => $data
        ], 200);
    }
    public function update($id,Request $request)
    {
        //mengupdate alamat
        $id = Alamat::where('user_id', $id)->first('id')->id;
        $kecamatan_id = Kecamatan::where('title', $request->kecamatan)->first('id')->id;
        $alamat = Alamat::findOrFail($id);
        $alamat->kecamatan_id = $kecamatan_id;
        $alamat->detail = $request->detail;
        $alamat->save();
        return response([
            'status' => 'OK',
            'message' => 'Alamat Berhasil Dirubah',
            'data' => $alamat
        ], 200);
    }
}
