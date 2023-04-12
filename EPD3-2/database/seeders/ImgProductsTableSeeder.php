<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        [    "routeImg" => "/img/",    "products_id" => 1  ],
        [    "routeImg" => "/img/",    "products_id" => 1  ],
        [    "routeImg" => "/img/",    "products_id" => 2  ],
        [    "routeImg" => "/img/",    "products_id" => 2  ],
        [    "routeImg" => "/img/",    "products_id" => 3  ],
        [    "routeImg" => "/img/",    "products_id" => 3  ],
        [    "routeImg" => "/img/",    "products_id" => 4  ],
        [    "routeImg" => "/img/",    "products_id" => 4  ],
        [    "routeImg" => "/img/",    "products_id" => 5  ],
        [    "routeImg" => "/img/",    "products_id" => 5  ],
        [    "routeImg" => "/img/",    "products_id" => 6  ],
        [    "routeImg" => "/img/",    "products_id" => 6  ],
        [    "routeImg" => "/img/",    "products_id" => 7  ],
        [    "routeImg" => "/img/",    "products_id" => 7  ],
        [    "routeImg" => "/img/",    "products_id" => 8  ],
        [    "routeImg" => "/img/",    "products_id" => 8  ],
        [    "routeImg" => "/img/",    "products_id" => 9  ],
        [    "routeImg" => "/img/",    "products_id" => 9  ],
        [    "routeImg" => "/img/",    "products_id" => 10  ],
        [    "routeImg" => "/img/",    "products_id" => 10  ]

        ]);
    }
}
