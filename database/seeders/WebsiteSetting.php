<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSetting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\WebsiteSetting::create([
            "id"=> 1,
            "logo"=> "uploads/logo.png",
            "banner"=> "Insert your banner here",
            "icon"=> "Insert your icon here",
            "slogan"=> "Insert your slogan here",
            "email"=> "Insert your email here",
            "mobile"=> "Insert your mobile here",
            "address"=> "Insert your address here",
            "about"=> "write your about us description",
            "facebook"=> "https://www.facebook.com",
            "twitter"=> "https://www.twitter.com",
            "youtube"=> "https://www.youtube.com",
            "linkedIn"=> "https://www.linkedIn.com",
            "map"=> "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14599.595646957583!2d90.4219536!3d23.822193449999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1703564956846!5m2!1sen!2sbd",
            'status'=>1,
        ]);
    }
}
