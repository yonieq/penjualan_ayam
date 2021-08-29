<?php

use Illuminate\Database\Seeder;
use App\Kecamatan;

class KecamatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data1 = 
        [
            'kabupaten_id' => '1',
            'kecamatan_id' => '1',
            'ongkir' => '10000',
            'title' => 'Slawi',
        ];
        Kecamatan::insert($data1);

        $data2 = 
        [
            'kabupaten_id' => '1',
            'kecamatan_id' => '2',
            'ongkir' => '15000',
            'title' => 'Pangkah',
        ];
        Kecamatan::insert($data2);

        $data3 = 
        [
            'kabupaten_id' => '1',
            'kecamatan_id' => '3',
            'ongkir' => '12000',
            'title' => 'Talang',
        ];
        Kecamatan::insert($data3);

        $data4 = 
        [
            'kabupaten_id' => '1',
            'kecamatan_id' => '4',
            'ongkir' => '11000',
            'title' => 'Adiwerna',
        ];
        Kecamatan::insert($data4);

        $data5 = 
        [
            'kabupaten_id' => '1',
            'kecamatan_id' => '5',
            'ongkir' => '16000',
            'title' => 'Tarub',
        ];
        Kecamatan::insert($data5);

        $data6 = 
        [
            'kabupaten_id' => '1',
            'kecamatan_id' => '6',
            'ongkir' => '18000',
            'title' => 'Kramat',
        ];
        Kecamatan::insert($data6);

        $data7 = 
        [
            'kabupaten_id' => '1',
            'kecamatan_id' => '7',
            'title' => 'Dukuhturi',
            'ongkir' => '20000',
        ];
        Kecamatan::insert($data7);
    }
}
