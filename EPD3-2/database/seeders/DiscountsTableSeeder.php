<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->insert([
        
            ["percentage" => 10, "products_id" => 1],
            ["percentage" => 20, "products_id" => 2],
            ["percentage" => 30, "products_id" => 3],
            ["percentage" => 40, "products_id" => 4],
            ["percentage" => 50, "products_id" => 5],
            ["percentage" => 15, "products_id" => 6],
            ["percentage" => 25, "products_id" => 7],
            ["percentage" => 35, "products_id" => 8],
            ["percentage" => 45, "products_id" => 9],
            ["percentage" => 55, "products_id" => 10]
        
        ]);
        
    }
}
