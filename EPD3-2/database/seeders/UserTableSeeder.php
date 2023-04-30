<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "John Doe",
                "email" => "johndoe@example.com",
                "password" => bcrypt("12345678")
            ],
            [
                "name" => "Jane Smith",
                "email" => "janesmith@example.com",
                "password" => bcrypt("password123")
            ],
            [
                "name" => "Mark Johnson",
                "email" => "markjohnson@example.com",
                "password" => bcrypt("mysecret123")
            ],
            [
                "name" => "Samantha Brown",
                "email" => "samanthabrown@example.com",
                "password" => bcrypt("samantha123")
            ],
            [
                "name" => "Michael Lee",
                "email" => "michaellee@example.com",
                "password" => bcrypt("mikeiscool")
            ],
            [
                "name" => "Emily Davis",
                "email" => "emilydavis@example.com",
                "password" => bcrypt("davisemily")
            ],
            [
                "name" => "Robert Turner",
                "email" => "robertturner@example.com",
                "password" => bcrypt("robert123")
            ],
            [
                "name" => "Jennifer Parker",
                "email" => "jenniferparker@example.com",
                "password" => bcrypt("jenniferp")
            ],
            [
                "name" => "David Kim",
                "email" => "davidkim@example.com",
                "password" => bcrypt("kimdavid12")
            ],
            [
                "name" => "Amy Nguyen",
                "email" => "amynguyen@example.com",
                "password" => bcrypt("amypassword")
            ],
            [
                "name" => "Sergio Cano Silva",
                "email_verified_at" => "2023-04-29 11:39:20",
                "is_admin" => true,
                "email" => "sergiocanosilva@gmail.com",
                "password" => bcrypt("25522552")
            ],
            [
                "name" => "Francisco Javier Nunyez Cintado",
                "email_verified_at" => "2023-04-29 11:39:20",
                "is_admin" => true,
                "email" => "francisconuncin@gmail.com",
                "password" => bcrypt("12345678")
            ],
            [
                "name" => "Jessica Rodriguez",
                "is_admin" => false,
                "email" => "jessicarodriguez@gmail.com",
                "password" => bcrypt("password")
            ]
        ];
        foreach ($users as $user) {
            $validator = Validator::make($user, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
                'email_verified_at' => 'nullable|date',
            ]);

            if ($validator->fails()) {
                continue; // Skip invalid user
            }

            User::create($user);
        }
    }
}
