<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $category = Category::inRandomOrder()->first();
            $product = Products::inRandomOrder()->first();
            CategoryProduct::create([
                'category_id' => $category->id,
                'product_id' => $product->id,
            ]);
        }
    }
}