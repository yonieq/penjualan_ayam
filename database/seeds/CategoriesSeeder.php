<?php

use Illuminate\Database\Seeder;
use App\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            'id' => '1',
            'name' => 'Daging Ayam',
        ];
        Categories::insert($data);

        $data1 = [
            'id' => '2',
            'name' => 'Ayam Hidup',
        ];
        Categories::insert($data1);
    }
}
