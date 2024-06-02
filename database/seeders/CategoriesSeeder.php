<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name"=> 'Bathroom Shelving',
            "type"=> 'physical',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/1.png',
            "icon"=> '/uploads/cat/1.png',
            "cover"=> '/uploads/cat/1.png',
            "meta"=> 'Bathroom Shelving',
            "metaDescription"=> 'Bathroom Shelving',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Smartwatches',
            "type"=> 'physical',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/2.jpg',
            "icon"=> '/uploads/cat/2.jpg',
            "cover"=> '/uploads/cat/2.jpg',
            "meta"=> 'Smartwatches',
            "metaDescription"=> 'Smartwatches',
            "status"=> 1,
        ]);


        Category::create([
            "name"=> 'Closed circuit camera',
            "type"=> 'physical',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/3.jpg',
            "icon"=> '/uploads/cat/3.jpg',
            "cover"=> '/uploads/cat/3.jpg',
            "meta"=> 'Closed circuit camera',
            "metaDescription"=> 'Closed circuit camera',
            "status"=> 1,
        ]);


        Category::create([
            "name"=> 'Men\'s T-shit',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/4.jpg',
            "icon"=> '/uploads/cat/4.jpg',
            "cover"=> '/uploads/cat/4.jpg',
            "meta"=> 'Men\'s T-shit',
            "metaDescription"=> 'Men\'s T-shit',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Wardrobe Organisers',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/5.jpg',
            "icon"=> '/uploads/cat/5.jpg',
            "cover"=> '/uploads/cat/5.jpg',
            "meta"=> 'Wardrobe Organisers',
            "metaDescription"=> 'Wardrobe Organisers',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Ear phone/ Head phone',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/6.jpg',
            "icon"=> '/uploads/cat/6.jpg',
            "cover"=> '/uploads/cat/6.jpg',
            "meta"=> 'Ear phone/ Head phone',
            "metaDescription"=> 'Ear phone/ Head phone',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Watch',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/7.jpg',
            "icon"=> '/uploads/cat/7.jpg',
            "cover"=> '/uploads/cat/7.jpg',
            "meta"=> 'Watch',
            "metaDescription"=> 'Watch',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Home Accessories',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/8.jpg',
            "icon"=> '/uploads/cat/8.jpg',
            "cover"=> '/uploads/cat/8.jpg',
            "meta"=> 'Home Accessories',
            "metaDescription"=> 'Home Accessories',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Lifestyle',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/9.jpg',
            "icon"=> '/uploads/cat/9.jpg',
            "cover"=> '/uploads/cat/9.jpg',
            "meta"=> 'Lifestyle',
            "metaDescription"=> 'Lifestyle',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Fairy Lights',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/10.jpg',
            "icon"=> '/uploads/cat/10.jpg',
            "cover"=> '/uploads/cat/10.jpg',
            "meta"=> 'Fairy Lights',
            "metaDescription"=> 'Fairy Lights',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Hats & Caps',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/11.jpg',
            "icon"=> '/uploads/cat/11.jpg',
            "cover"=> '/uploads/cat/11.jpg',
            "meta"=> 'Hats & Caps',
            "metaDescription"=> 'Hats & Caps',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Humidifiers',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/12.jpg',
            "icon"=> '/uploads/cat/12.jpg',
            "cover"=> '/uploads/cat/12.jpg',
            "meta"=> 'Humidifiers',
            "metaDescription"=> 'Humidifiers',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Rings',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/13.jpg',
            "icon"=> '/uploads/cat/13.jpg',
            "cover"=> '/uploads/cat/13.jpg',
            "meta"=> 'Rings',
            "metaDescription"=> 'Rings',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Eyelashes & Eyeglasses',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/14.jpg',
            "icon"=> '/uploads/cat/14.jpg',
            "cover"=> '/uploads/cat/14.jpg',
            "meta"=> 'Eyelashes & Eyeglasses',
            "metaDescription"=> 'Eyelashes & Eyeglasses',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Smart PHone',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/15.jpg',
            "icon"=> '/uploads/cat/15.jpg',
            "cover"=> '/uploads/cat/15.jpg',
            "meta"=> 'Smart PHone',
            "metaDescription"=> 'Smart PHone',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Modelling and Sculpting',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/16.jpg',
            "icon"=> '/uploads/cat/16.jpg',
            "cover"=> '/uploads/cat/16.jpg',
            "meta"=> 'Modelling and Sculpting',
            "metaDescription"=> 'Modelling and Sculpting',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Chino',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/17.jpg',
            "icon"=> '/uploads/cat/17.jpg',
            "cover"=> '/uploads/cat/17.jpg',
            "meta"=> 'Chino',
            "metaDescription"=> 'Chino',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Modelling & Sculpting',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/18.jpg',
            "icon"=> '/uploads/cat/18.jpg',
            "cover"=> '/uploads/cat/18.jpg',
            "meta"=> 'Modelling & Sculpting',
            "metaDescription"=> 'Modelling & Sculpting',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Groceries',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/19.jpg',
            "icon"=> '/uploads/cat/19.jpg',
            "cover"=> '/uploads/cat/19.jpg',
            "meta"=> 'Groceries',
            "metaDescription"=> 'Groceries',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Sports & Outdoors',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/20.png',
            "icon"=> '/uploads/cat/20.png',
            "cover"=> '/uploads/cat/20.png',
            "meta"=> 'Sports & Outdoors',
            "metaDescription"=> 'Sports & Outdoors',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Automotive & Motorbike',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/21.jpg',
            "icon"=> '/uploads/cat/21.jpg',
            "cover"=> '/uploads/cat/21.jpg',
            "meta"=> 'Automotive & Motorbike',
            "metaDescription"=> 'Automotive & Motorbike',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Traditional Wear',
            "type"=> 'digital',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/22.jpg',
            "icon"=> '/uploads/cat/22.jpg',
            "cover"=> '/uploads/cat/22.jpg',
            "meta"=> 'Traditional Wear',
            "metaDescription"=> 'Traditional Wear',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Trendy Mobile Accessories',
            "type"=> 'physical',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/23.jpg',
            "icon"=> '/uploads/cat/23.jpg',
            "cover"=> '/uploads/cat/23.jpg',
            "meta"=> 'Trendy Mobile Accessories',
            "metaDescription"=> 'Trendy Mobile Accessories',
            "status"=> 1,
        ]);

        Category::create([
            "name"=> 'Personal Care',
            "type"=> 'physical',
            "parent_id"=> 0,
            "level"=> 0,
            "orderNumber"=> '',
            "banner"=> '/uploads/cat/24.jpg',
            "icon"=> '/uploads/cat/24.jpg',
            "cover"=> '/uploads/cat/24.jpg',
            "meta"=> 'Personal Care',
            "metaDescription"=> 'Personal Care',
            "status"=> 1,
        ]);

    }
}
