<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'product_name'      => 'T-Shart',
            'product_qty'       => 3,
            'product_color'     => 'green',
            'product_size'      => 'XL',
            'product_price'     => 100.00,
            'total_price'       => 3*100.00,
            'order_number'      => '000001',
            'total_shipping'    => '5.00',
            'delivery_address'  => '123 Main St, City, Country',
            'payment_method'    => 'Credit Card',
            'order_status'      => 1,
            'delivery_status'   => 0,
            'payment_amount'    => 300.00,
            'payment_date'      => now(),
            'delivery_date'     => now(),
            'payment_status'    => 0,
            'currency'          => 'BDT',
            'transaction_id'    => 1,
            'coupon'            => 'ABC123',
            'product_type'      => 'in_house',
            'role_id'           => 3,
            'role'              => 'seller',
        ]);
        Order::create([
            'product_name'      => 'Pant',
            'product_qty'       => 5,
            'product_color'     => 'red',
            'product_size'      => 'X',
            'product_price'     => 100.00,
            'total_price'       => 5*100.00,
            'order_number'      => '000002',
            'total_shipping'    => '5.00',
            'delivery_address'  => '123 Main St, City, Country',
            'payment_method'    => 'Credit Card',
            'order_status'      => 0,
            'delivery_status'   => 0,
            'payment_amount'    => 500.00,
            'payment_date'      => now(),
            'delivery_date'     => now(),
            'payment_status'    => 0,
            'currency'          => 'BDT',
            'transaction_id'    => 1,
            'coupon'            => 'ABC124',
            'product_type'      => 'digital_product',
            'role_id'           => 3,
            'role'              => 'seller',
        ]);
        Order::create([
            'product_name'      => 'Shows',
            'product_qty'       => 10,
            'product_color'     => 'green',
            'product_size'      => 'XL',
            'product_price'     => 100.00,
            'total_price'       => 10*100.00,
            'order_number'      => '000001',
            'total_shipping'    => '5.00',
            'delivery_address'  => '123 Main St, City, Country',
            'payment_method'    => 'Credit Card',
            'order_status'      => 1,
            'delivery_status'   => 0,
            'payment_amount'    => 1000.00,
            'payment_date'      => now(),
            'delivery_date'     => now(),
            'payment_status'    => 0,
            'currency'          => 'BDT',
            'transaction_id'    => 1,
            'coupon'            => 'ABC125',
            'product_type'      => 'wholesale_product',
            'role_id'           => 3,
            'role'              => 'seller',
        ]);
    }
}


