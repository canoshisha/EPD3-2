<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
    [        "name" => "John Doe",        "email" => "johndoe@example.com",        "password" => "12345678"    ],
    [        "name" => "Jane Smith",        "email" => "janesmith@example.com",        "password" => "password123"    ],
    [        "name" => "Mark Johnson",        "email" => "markjohnson@example.com",        "password" => "mysecret123"    ],
    [        "name" => "Samantha Brown",        "email" => "samanthabrown@example.com",        "password" => "samantha123"    ],
    [        "name" => "Michael Lee",        "email" => "michaellee@example.com",        "password" => "mikeiscool"    ],
    [        "name" => "Emily Davis",        "email" => "emilydavis@example.com",        "password" => "davisemily"    ],
    [        "name" => "Robert Turner",        "email" => "robertturner@example.com",        "password" => "robert123"    ],
    [        "name" => "Jennifer Parker",        "email" => "jenniferparker@example.com",        "password" => "jenniferp"    ],
    [        "name" => "David Kim",        "email" => "davidkim@example.com",        "password" => "kimdavid12"    ],
    [        "name" => "Amy Nguyen",        "email" => "amynguyen@example.com",        "password" => "amypassword"    ]
            
        ]);
    }
}
