<?php

namespace App\Services;

use App\Models\Upload;
use App\Models\ProductStock;
use App\Utility\ProductUtility;
use AizPackages\CombinationGenerate\Services\CombinationService;

class ProductStockService
{
    public function store(array $data, $product)
    {
        $collection = collect($data);
        $collection2 = collect($data)->only(['colors', 'choice_no', 'product_price', 'bar_code']);

        $options = ProductUtility::get_attribute_options($collection2);
        $combinations = (new CombinationService())->generate_combination($options);

        $variant = '';
        if (count($combinations) > 0) {
            foreach ($combinations as $key => $combination) {

                $str = ProductUtility::get_combination_string($combination, $collection);
                $price_text = 'price_' . str_replace('.', '_', $str);
                $product_stock = new ProductStock();
                $product_stock->product_id = $product->id;
                $product_stock->variant = $str;
                $product_stock->price = request()['price_' . str_replace('.', '_', $str)];
                $product_stock->sku = request()['sku_' . str_replace('.', '_', $str)];
                $product_stock->qty = request()['qty_' . str_replace('.', '_', $str)];

                $img_id = request()['img_' . str_replace('.', '_', $str)];
                $upload = Upload::where('id', $img_id)->first();
                if (request()['img_' . str_replace('.', '_', $str)] != ''){
                    $product_stock->image = $upload->file;
                }

                $product_stock->save();
            }
        }
        else {
            ProductStock::create([
                'product_id' => $product->id,
                'variant' => $data['name'],
                'sku' => $data['bar_code'],
                'price' => $data['product_price'],
                'qty' => $data['product_stock']
            ]);
        }
    }
}
