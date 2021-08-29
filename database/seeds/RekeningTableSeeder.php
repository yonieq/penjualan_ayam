<?php

use Illuminate\Database\Seeder;
use App\Rekening;
class RekeningTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = 
        [
            'bank_name' => 'BRI',
            'atas_nama'=>'NASRO',
            'no_rekening'=>'03774661008'
        ];
        Rekening::insert($data);
    }
}
