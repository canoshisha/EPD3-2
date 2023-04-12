<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phones')->insert([
        
            ["phone" => "611223344", "users_id" => 1],
            ["phone" => "633445566", "users_id" => 2],
            ["phone" => "655667788", "users_id" => 3],
            ["phone" => "677889900", "users_id" => 4],
            ["phone" => "699001122", "users_id" => 5],
            ["phone" => "722112233", "users_id" => 6],
            ["phone" => "744334455", "users_id" => 7],
            ["phone" => "766556677", "users_id" => 8],
            ["phone" => "788778899", "users_id" => 9],
            ["phone" => "700112233", "users_id" => 10]
        
        ]);        
    }
}
