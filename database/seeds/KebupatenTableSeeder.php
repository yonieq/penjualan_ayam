<?php

use Illuminate\Database\Seeder;
use App\Kabupaten;

class KebupatenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = 
        [
            'kabupaten_id' => '1',
            'title' => 'Tegal',
        ];
        Kabupaten::insert($data);
    }
}
