<?php

namespace Database\Seeders;

use App\Models\OrdersDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrdersDetails::create([
            'order_id'        =>1,
            'user_id'         =>2,
            'product_id'      =>3,
            'courier_id'      =>4,
            'phone'           =>'938459',
            'email'           =>'customer@gmail.com',
            'order_date'      =>now(),
            'tax_total'      =>5.00,
            'minQty'         =>5,
            'maxQty'         =>10,
            'unit_price'     =>100.50,
            'billing'        =>'Dhaka billing',
            'shipping'       =>'Narsingdi Shipping',
        ]);
        OrdersDetails::create([
            'order_id'        =>2,
            'user_id'         =>2,
            'product_id'      =>3,
            'courier_id'      =>4,
            'phone'           =>'938459fd',
            'email'           =>'customer2@gmail.com',
            'order_date'      =>now(),
            'tax_total'      =>5.00,
            'minQty'         =>5,
            'maxQty'         =>10,
            'unit_price'     =>100.50,
            'billing'        =>'Dhaka billing',
            'shipping'       =>'Narsingdi Shipping',
        ]);
        OrdersDetails::create([
            'order_id'        =>2,
            'user_id'         =>2,
            'product_id'      =>3,
            'courier_id'      =>4,
            'phone'           =>'938459fd',
            'email'           =>'customer3@gmail.com',
            'order_date'      =>now(),
            'tax_total'      =>5.00,
            'minQty'         =>5,
            'maxQty'         =>10,
            'unit_price'     =>100.50,
            'billing'        =>'Dhaka billing',
            'shipping'       =>'Narsingdi Shipping',
        ]);
    }
}
