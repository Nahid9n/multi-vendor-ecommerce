<?php

use App\Models\Category;
use App\Models\Color;
use App\Models\Attribute;
use App\Models\Permission;
use App\Models\Product;
use App\Models\ProductQueries;
use App\Models\RolePermission;
use Illuminate\Support\Str;


if (!function_exists('get_single_attribute_name')) {
    function get_single_attribute_name($attribute)
    {
        $attribute_query = Attribute::query();
        return $attribute_query->find($attribute)->name;
    }
}

// Get single Color name
if (!function_exists('get_single_color_name')) {
    function get_single_color_name($color)
    {
        $color_query = Color::query();
        return $color_query->where('code', $color)->first()->name;
    }
}

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = '//' . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        return $root;
    }
}


if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL()
    {
        if (env('FILESYSTEM_DRIVER') != 'local') {
            return env(Str::upper(env('FILESYSTEM_DRIVER')) . '_URL') . '/';
        }
        return getBaseURL() . 'public/';
    }
}


if (!function_exists('getProductDetails')) {
    function getProductDetails($productId)
    {
        try {
            $product = Product::findOrFail($productId);
            return $product;
        } catch (\Exception $e) {
            Log::error('Error fetching product details: ' . $e->getMessage());
            return null;
        }
    }
}
if (!function_exists('truncateWords')) {
    function truncateWords($text, $limit = 100) {
        $words = explode(' ', $text);
        if (count($words) > $limit) {
            return implode(' ', array_slice($words, 0, $limit)) . '...';
        }
        return $text;
    }
}
