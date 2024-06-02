<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SellerShopSetting::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WebsiteSetting::class);
        $this->call(FeatureActivationSeeder::class);
        $this->call(SellerCommissionSeeder::class);
        // $this->call(CategoriesSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(SliderSeeder::class);

    }
}
