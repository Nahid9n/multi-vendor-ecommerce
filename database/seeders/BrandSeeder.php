<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::create([
            'name' => 'Kilogram',
            'code' => 'kg',
        ]);
        Unit::create([
            'name' => 'Meter',
            'code' => 'm',
        ]);
        Brand::create([
            "name" => 'Piking',
            "logo" => "uploads/brands/aaa.jpg",
            "meta" => 'Piking',
            "meta_description" => 'Piking',
            "featured_status" => 0,
            "status" => 1,
        ]);

        Brand::create([
            "name" => 'Apple',
            "logo" => "uploads/brands/apple.jpg",
            "meta" =>'Apple' ,
            "meta_description" => 'Apple',
            "featured_status" => 0,
            "status" => 1,
        ]);
        Brand::create([
            "name" => 'Asus',
            "logo" => "uploads/brands/asus.jpg",
            "meta" => 'Asus',
            "meta_description" => 'Asus',
            "featured_status" => 0,
            "status" => 1,
        ]);
        Brand::create([
            "name" => 'Baseus',
            "logo" => "uploads/brands/baseus.jpg",
            "meta" => 'Baseus',
            "meta_description" => 'Baseus',
            "featured_status" => 0,
            "status" => 1,
        ]);
        Brand::create([
            "name" => 'Edifier',
            "logo" => "uploads/brands/edifier.jpg",
            "meta" => 'Edifier',
            "meta_description" => 'Edifier',
            "featured_status" => 0,
            "status" => 1,
        ]);

        Brand::create([
            "name" => 'General',
            "logo" => "uploads/brands/general.jpg",
            "meta" => 'General',
            "meta_description" => 'General',
            "featured_status" => 0,
            "status" => 1,
        ]);

        Brand::create([
            "name" => 'Gree',
            "logo" => "uploads/brands/gree.jpg",
            "meta" => 'Gree',
            "meta_description" => 'Gree',
            "featured_status" => 0,
            "status" => 1,
        ]);

        Brand::create([
            "name" => 'Panasonic',
            "logo" => "uploads/brands/panasonic.jpg",
            "meta" => 'Panasonic',
            "meta_description" => 'Panasonic',
            "featured_status" => 0,
            "status" => 1,
        ]);

        Brand::create([
            "name" => 'Samsung',
            "logo" => "uploads/brands/samsung.jpg",
            "meta" => 'Samsung',
            "meta_description" => 'Samsung',
            "featured_status" => 0,
            "status" => 1,
        ]);

        Brand::create([
            "name" => 'Sharp',
            "logo" => "uploads/brands/sharp.jpg",
            "meta" => 'Sharp',
            "meta_description" => 'Sharp',
            "featured_status" => 0,
            "status" => 1,
        ]);



    }
}
