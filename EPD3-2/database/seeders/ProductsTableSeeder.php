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

        DB::table('products')->insert([
            [
                "name" => "Aston Martin Aramco Cognizant F1 2023 Camiseta oficial del piloto del equipo Fernando Alonso",
                "price" => 79.99,
                "description" => "Camiseta oficial del equipo Aston Martin Aramco Cognizant F1 2023 usada por el piloto Fernando Alonso.",
                "discount" => 0
            ],
            [
                "name" => "Gorra oficial del equipo Aston Martin Aramco Cognizant F1 2023 - Verde",
                "price" => 38.99,
                "description" => "Gorra oficial del equipo Aston Martin Aramco Cognizant F1 2023 de color verde.",
                "discount" => 12
            ],
            [
                "name" => "Camiseta del equipo Scuderia Ferrari 2022",
                "price" => 38.25,
                "description" => "Camiseta oficial del equipo Scuderia Ferrari para la temporada 2022.",
                "discount" => 10
            ],
            [
                "name" => "Red Bull Racing Honda Men's Team T-Shirt",
                "price" => 32.99,
                "description" => "Camiseta oficial del equipo Red Bull Racing Honda para hombres.",
                "discount" => 17
            ],
            [
                "name" => "Gorra Red Bull Racing Honda 2021",
                "price" => 28.99,
                "description" => "Gorra oficial del equipo Red Bull Racing Honda para la temporada 2021.",
                "discount" => 0
            ],
            [
                "name" => "Gorra Scuderia Ferrari Formula 1 Team 2021",
                "price" => 12.99,
                "description" => "Gorra oficial del equipo Scuderia Ferrari para la temporada 2021.",
                "discount" => 5
            ],
            [
                "name" => "Gorra Mercedes F1 Team 2021",
                "price" => 23.99,
                "description" => "Gorra oficial del equipo Mercedes para la temporada 2021.",
                "discount" => 14
            ],
            [
                "name" => "McLaren F1 Team Men's Logo T-Shirt",
                "price" => 45.99,
                "description" => "Camiseta oficial del equipo McLaren F1 para hombres con el logo del equipo.",
                "discount" => 18
            ],
            [
                "name" => "Gorra McLaren F1 Team 2021",
                "price" => 17.99,
                "description" => "Gorra oficial del equipo McLaren para la temporada 2021.",
                "discount" => 0
            ],[
                "name" => "Mercedes-AMG Petronas F1 Team Men's Black Logo T-Shirt",
                "price" => 32.99,
                "description" => "Camiseta negra con el logo del equipo Mercedes-AMG Petronas de Fórmula 1. Ideal para los fanáticos de este equipo y de la F1 en general. Fabricada con materiales de alta calidad para asegurar comodidad y durabilidad.",
                "discount" => 18
                ]
            ]);
    }
}