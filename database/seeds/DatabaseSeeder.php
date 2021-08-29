<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CouriersTableSeeder::class);
        $this->call(KebupatenTableSeeder::class);
        $this->call(KecamatanTableSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(RekeningTableSeeder::class);
        $this->call(AlamatTokoSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CategoriesSeeder::class);
    }
}
