<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'type' => 'Ferrari'
        ]);
        Category::create([
            'type' => 'Mercedes'
        ]);
        Category::create([
            'type' => 'Aston Martin'
        ]);
        Category::create([
            'type' => 'Red Bull'
        ]);
        Category::create([
            'type' => 'McLaren'
        ]);
        Category::create([
            'type' => 'Gorra'
        ]);
        Category::create([
            'type' => 'Camiseta'
        ]);
    }
}