<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImgProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('img_products')->insert([
        [    "routeImg" => "/img/Merchandising1.jpg", "tipo"=>"imagenMenu"     ,"products_id" => 1  ],
        [    "routeImg" => "/img/camisetaAston2.jpg", "tipo"=>"imagen"   ,"products_id" => 1  ],
        [    "routeImg" => "/img/gorraAston1.jpg",  "tipo"=>"imagenMenu" , "products_id" => 2  ],
        [    "routeImg" => "/img/gorraAston2.jpg",  "tipo"=>"imagen" , "products_id" => 2  ],
        [    "routeImg" => "/img/Merchandising3.jpg",  "tipo"=>"imagenMenu"  ,"products_id" => 3  ],
        [    "routeImg" => "/img/Merchandising4.jpg",  "tipo"=>"imagen"  ,"products_id" => 3  ],
        [    "routeImg" => "/img/redbull1.jpg",  "tipo"=>"imagenMenu",  "products_id" => 4  ],
        [    "routeImg" => "/img/redbull2.jpg",  "tipo"=>"imagen"  ,"products_id" => 4  ],
        [    "routeImg" => "/img/gorraRedbull1.jpg",  "tipo"=>"imagenMenu" , "products_id" => 5  ],
        [    "routeImg" => "/img/gorraRedbull2.jpg",  "tipo"=>"imagen"  ,"products_id" => 5  ],
        [    "routeImg" => "/img/gorraFerrari1.jpg",  "tipo"=>"imagenMenu" , "products_id" => 6  ],
        [    "routeImg" => "/img/gorraFerrari2.jpg",  "tipo"=>"imagen" , "products_id" => 6  ],
        [    "routeImg" => "/img/gorraMercedes1.jpg",  "tipo"=>"imagenMenu" , "products_id" => 7  ],
        [    "routeImg" => "/img/gorraMercedes2.jpg",  "tipo"=>"imagen" , "products_id" => 7  ],
        [    "routeImg" => "/img/macclaren1.jpg",  "tipo"=>"imagenMenu",  "products_id" => 8  ],
        [    "routeImg" => "/img/macclaren2.jpg",  "tipo"=>"imagen" , "products_id" => 8  ],
        [    "routeImg" => "/img/gorraMacclaren1.jpg",  "tipo"=>"imagenMenu" , "products_id" => 9  ],
        [    "routeImg" => "/img/gorraMacclaren2.jpg",  "tipo"=>"imagen" , "products_id" => 9  ],
        [    "routeImg" => "/img/mercedes1.jpg",  "tipo"=>"imagenMenu"  ,"products_id" => 10  ],
        [    "routeImg" => "/img/mercedes2.jpg",  "tipo"=>"imagen"  ,"products_id" => 10  ]
        
    ]);
    }
}
