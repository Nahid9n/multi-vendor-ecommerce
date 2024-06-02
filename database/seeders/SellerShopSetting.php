<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerShopSetting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SellerShopSetting::create([
            "id"=> 1,
            'seller_id' =>1,
        ]);
    }
}
