<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            ProductsTableSeeder::class,
            SizeTableSeeder::class,
            PhonesTableSeeder::class,
            ImgProductsTableSeeder::class,
            CategorySeeder::class,
            CategoryProductSeeder::class,
            SizeProductsSeeder::class,
        ]);
    }
}