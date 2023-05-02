<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SizeProduct;
use App\Models\Size;
use App\Models\Products;

class SizeProductsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            $size = Size::inRandomOrder()->first();
            $product = Products::inRandomOrder()->first();
            SizeProduct::create([
                'size_id' => $size->id,
                'product_id' => $product->id,
                'stock' => rand(0, 20),
            ]);
        }
    }
}