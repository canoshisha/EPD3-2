<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('products')->insert([
            
        //     [        "name" => "Aston Martin Aramco Cognizant F1 2023 Camiseta oficial del piloto del equipo Fernando Alonso",        "size" => "S",        "category" => "camiseta"    , "price"=> 79.99 ,"stock"=>3, "description"=>""],
        //     [        "name" => "Gorra oficial del equipo Aston Martin Aramco Cognizant F1 2023 - Verde",        "size" => "S",        "category" => "gorra"    ,"price"=> 39.00, "stock"=>10, "description"=>""],
        //     [        "name" => "Camiseta del equipo Scuderia Ferrari 2022",        "size" => "M",        "category" => "camiseta"    ,"price"=> 38.25, "stock"=>11, "description"=>""],
        //     [        "name" => "Red Bull Racing Honda Men's Team T-Shirt",        "size" => "L",        "category" => "camiseta"    ,"price"=> 32.99, "stock"=>8, "description"=>""],
        //     [        "name" => "Gorra Red Bull Racing Honda 2021",        "size" => "M",        "category" => "gorra"    ,"price"=> 28.99, "stock"=>7, "description"=>""],
        //     [        "name" => "Gorra Scuderia Ferrari Formula 1 Team 2021",        "size" => "L",        "category" => "gorra"    ,"price"=> 12.99, "stock"=>3, "description"=>""],
        //     [        "name" => "Gorra Mercedes F1 Team 2021",        "size" => "S",        "category" => "gorra"    ,"price"=> 23.99, "stock"=>2, "description"=>""],
        //     [        "name" => "McLaren F1 Team Men's Logo T-Shirt",        "size" => "S",        "category" => "camiseta"    ,"price"=> 45.99, "stock"=>6, "description"=>""],
        //     [        "name" => "Gorra McLaren F1 Team 2021",        "size" => "M",        "category" => "gorra"    ,"price"=> 17.99, "stock"=>5, "description"=>""],
        //     [        "name" => "Mercedes-AMG Petronas F1 Team Men's Black Logo T-Shirt",        "size" => "M",        "category" => "camiseta"    ,"price"=> 32.99, "stock"=>4, "description"=>""]
                    
        //         ]);
        DB::table('products')->insert([
            [
                "name" => "Aston Martin Aramco Cognizant F1 2023 Camiseta oficial del piloto del equipo Fernando Alonso",
                "category" => "camiseta",
                "price" => 79.99,
                "stock" => 3,
                "description" => "Camiseta oficial del equipo Aston Martin Aramco Cognizant F1 2023 usada por el piloto Fernando Alonso."
            ],
            [
                "name" => "Gorra oficial del equipo Aston Martin Aramco Cognizant F1 2023 - Verde",
                "category" => "gorra",
                "price" => 38.99,
                "stock" => 10,
                "description" => "Gorra oficial del equipo Aston Martin Aramco Cognizant F1 2023 de color verde."
            ],
            [
                "name" => "Camiseta del equipo Scuderia Ferrari 2022",
                "category" => "camiseta",
                "price" => 38.25,
                "stock" => 11,
                "description" => "Camiseta oficial del equipo Scuderia Ferrari para la temporada 2022."
            ],
            [
                "name" => "Red Bull Racing Honda Men's Team T-Shirt",
                "category" => "camiseta",
                "price" => 32.99,
                "stock" => 8,
                "description" => "Camiseta oficial del equipo Red Bull Racing Honda para hombres."
            ],
            [
                "name" => "Gorra Red Bull Racing Honda 2021",
                "category" => "gorra",
                "price" => 28.99,
                "stock" => 7,
                "description" => "Gorra oficial del equipo Red Bull Racing Honda para la temporada 2021."
            ],
            [
                "name" => "Gorra Scuderia Ferrari Formula 1 Team 2021",
                "category" => "gorra",
                "price" => 12.99,
                "stock" => 3,
                "description" => "Gorra oficial del equipo Scuderia Ferrari para la temporada 2021."
            ],
            [
                "name" => "Gorra Mercedes F1 Team 2021",
                "category" => "gorra",
                "price" => 23.99,
                "stock" => 2,
                "description" => "Gorra oficial del equipo Mercedes para la temporada 2021."
            ],
            [
                "name" => "McLaren F1 Team Men's Logo T-Shirt",
                "category" => "camiseta",
                "price" => 45.99,
                "stock" => 6,
                "description" => "Camiseta oficial del equipo McLaren F1 para hombres con el logo del equipo."
            ],
            [
                "name" => "Gorra McLaren F1 Team 2021",
                "category" => "gorra",
                "price" => 17.99,
                "stock" => 5,
                "description" => "Gorra oficial del equipo McLaren para la temporada 2021."
            ],[
                "name" => "Mercedes-AMG Petronas F1 Team Men's Black Logo T-Shirt",
                "category" => "camiseta",
                "price" => 32.99,
                "stock" => 4,
                "description" => "Camiseta negra con el logo del equipo Mercedes-AMG Petronas de Fórmula 1. Ideal para los fanáticos de este equipo y de la F1 en general. Fabricada con materiales de alta calidad para asegurar comodidad y durabilidad."
                ]
            ]);
    }
}
