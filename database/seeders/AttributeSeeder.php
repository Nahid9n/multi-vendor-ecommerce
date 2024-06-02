<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attribute::create([
            'id'    =>'1',
            'name'  =>'Size',
        ]);
        AttributeValue::create([
            'attribute_id' =>'1',
            'value'        =>'M',
        ]);
        AttributeValue::create([
            'attribute_id' =>'1',
            'value'        =>'XL',
        ]);
        AttributeValue::create([
            'attribute_id' =>'1',
            'value'        =>'XXL',
        ]);
    }
}
