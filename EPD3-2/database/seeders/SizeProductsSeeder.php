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
    $products = Products::all();
    $sizes = Size::all();

    foreach ($products as $product) {
        foreach ($sizes as $size) {
            SizeProduct::create([
                'size_id' => $size->id,
                'product_id' => $product->id,
                'stock' => rand(0, 20),
            ]);
        }
    }
}
}
