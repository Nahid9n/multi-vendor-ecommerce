<?php

namespace Database\Seeders;



use App\Models\Seller;

use App\Models\Role;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
               "name"=> "Admin",
                "email"=> "admin@gmail.com",
                "password"=> bcrypt("123456"),
                "role"=> "admin",
                "status"=> 1,

            ]);
        User::create([
               'name'=> 'Manager',
                'email'=> 'manager@gmail.com',
                'password'=> bcrypt('123456'),
                'role'=> 'manager',
                "status"=> 1,
        ]);

        User::create([
            'name'=> 'Seller',
            'email'=> 'seller@gmail.com',
            'password'=> bcrypt('123456'),
            'email_verified_at'=>now(),
            'role'=> 'seller',
        ]);
        Seller::create([
            'user_id'   =>3,
            'shop_name' =>'Welcome Shop',
            'address'   =>'Dhaka,Bangladesh',
        ]);

    }
}
