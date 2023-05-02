<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
        
            ["size" => "S"],
            ["size" => "M"],
            ["size" => "L"],
            ["size" => "XL"],
            ["size" => "XXL"],
            ["size" => "XXXL"],
        ]); 
    }
}
