<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    private static $productType,$image,$imageName,$directory,$imageUrl;
    private static function getImage($request){
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'uploads/products/type/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newProductType($request){
        self::$productType = new ProductType();
        self::$productType->name = $request->name;
        if ($request->image != ''){
            $image = Upload::find($request->image);
            self::$productType->image = $image->file;
        }
        self::$productType->status = $request->status;
        self::$productType->save();
    }
    public static function updateProductType($request,$id){
        self::$productType = ProductType::find($id);
        self::$imageUrl = $request->file('image') ? self::getImage($request):'';
        if ($request->image != ''){
            $image = Upload::find($request->image);
            self::$productType->image = $image->file;
        }
        self::$productType->name = $request->name;
        self::$productType->status = $request->status;
        self::$productType->save();
    }
    public static function deleteProductType($id){
        self::$productType = ProductType::find($id);
        self::$productType->delete();
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}
