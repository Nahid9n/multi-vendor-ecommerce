<?php

namespace Database\Seeders;

use App\Models\SellerCommission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerCommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SellerCommission::create([
            'id'=> 1,
            'commission_status'=> 1,
            'category_based_commission'=> 0,
            'previous_seller_commission'=> 0,
        ]);
    }
}
