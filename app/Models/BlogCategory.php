<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    private static $blog_category;
    public static function newBlogCategory($request){
        self::$blog_category = new BlogCategory();
        self::$blog_category->name = $request->name;
        self::$blog_category->status = $request->status;
        self::$blog_category->save();
    }
    public static function updateBlogCategory($request,$id){
        self::$blog_category = BlogCategory::find($id);
        self::$blog_category->name = $request->name;
        self::$blog_category->status = $request->status;
        self::$blog_category->save();
    }
    public static function deleteBlogCategory($id){
        self::$blog_category = BlogCategory::find($id);
        self::$blog_category->delete();
    }
    public function blog(){
        return $this->hasMany(Blog::class);
    }
}
