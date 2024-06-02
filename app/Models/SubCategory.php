<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $subCategory, $image, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = "uploads/products/sub-category/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newSubCategory($request)
    {
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id    = $request->category_id;
        self::$subCategory->name           = $request->name;
        self::$subCategory->description    = $request->description;
        if ($request->image != ''){
            $image = Upload::find($request->image);
            self::$subCategory->image          = $image->file;
        }
        self::$subCategory->status         = $request->status;
        self::$subCategory->save();
    }

    public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);
        self::$subCategory->category_id    = $request->category_id;
        self::$subCategory->name           = $request->name;
        self::$subCategory->description    = $request->description;
        if ($request->image != ''){
            $image = Upload::find($request->image);
            self::$subCategory->image          = $image->file;
        }
        self::$subCategory->status         = $request->status;
        self::$subCategory->save();
    }
    public static function deleteSubCategory($subCategory)
    {
        $subCategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
