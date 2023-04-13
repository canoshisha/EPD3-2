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

    [        "name" => "John Doe",        "email" => "johndoe@example.com",        "password" => bcrypt("12345678") ],
    [        "name" => "Jane Smith",        "email" => "janesmith@example.com",        "password" => bcrypt("password123")    ],
    [        "name" => "Mark Johnson",        "email" => "markjohnson@example.com",        "password" => bcrypt("mysecret123")    ],
    [        "name" => "Samantha Brown",        "email" => "samanthabrown@example.com",        "password" => bcrypt("samantha123")    ],
    [        "name" => "Michael Lee",        "email" => "michaellee@example.com",        "password" => bcrypt("mikeiscool")   ],
    [        "name" => "Emily Davis",        "email" => "emilydavis@example.com",        "password" => bcrypt("davisemily")   ],
    [        "name" => "Robert Turner",        "email" => "robertturner@example.com",        "password" => bcrypt("robert123")  ],
    [        "name" => "Jennifer Parker",        "email" => "jenniferparker@example.com",        "password" => bcrypt("jenniferp")  ],
    [        "name" => "David Kim",        "email" => "davidkim@example.com",        "password" => bcrypt("kimdavid12")   ],
    [        "name" => "Amy Nguyen",        "email" => "amynguyen@example.com",        "password" => bcrypt("amypassword")    ]

        ]);
    }
}
