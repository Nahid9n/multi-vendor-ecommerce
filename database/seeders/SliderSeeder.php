<?php

namespace Database\Seeders;

use App\Models\WebsiteSlider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebsiteSlider::create([
            "title" => 'slider 1',
            "image" => 'uploads//sliderExample.jpg',
            "banner" => '',
            "slogan" => 'slider 1',
            "meta" => 'slider 1',
            "meta_description" => 'slider 1',
            "status" => 1,
        ]);

        WebsiteSlider::create([
            "title" => 'slider 2',
            "image" => 'uploads//sliderExample.jpg',
            "banner" => '',
            "slogan" => 'slider 2',
            "meta" => 'slider 2',
            "meta_description" => 'slider 2',
            "status" => 1,
        ]);

        WebsiteSlider::create([
            "title" => 'slider 3',
            "image" => 'uploads/sliderExample.jpg',
            "banner" => '',
            "slogan" => 'slider 3',
            "meta" => 'slider 3',
            "meta_description" => 'slider 3',
            "status" => 1,
        ]);
    }
}
