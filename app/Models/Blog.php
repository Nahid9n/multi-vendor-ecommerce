<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    private static $blog;

    public static function newBlog($request){

        self::$blog = new Blog();
        self::$blog->title = $request->title;
        self::$blog->category_id = $request->category_id;
        self::$blog->slug = Str::slug($request->title);
        if ($request->banner != ''){
            $banner = Upload::find($request->banner);
            self::$blog->banner = $banner->file;
        }

        self::$blog->short_description = $request->short_description;
        self::$blog->long_description = $request->long_description;
        self::$blog->meta_title = $request->meta_title;
        if ($request->meta_image != ''){
            $meta_image = Upload::find($request->meta_image);
            self::$blog->meta_image = $meta_image->file;
        }
        self::$blog->meta_description = $request->meta_description;
        self::$blog->meta_keyword = $request->meta_keyword;
        self::$blog->status = $request->status;
        self::$blog->save();
        return self::$blog;
    }
    public static function updateBlog($request,$id){

        self::$blog = Blog::find($id);
        self::$blog->title = $request->title;
        self::$blog->category_id = $request->category_id;
        self::$blog->slug = Str::slug($request->title);
        if ($request->banner != ''){
            $banner = Upload::find($request->banner);
            self::$blog->banner = $banner->file;
        }

        self::$blog->short_description = $request->short_description;
        self::$blog->long_description = $request->long_description;
        self::$blog->meta_title = $request->meta_title;
        if ($request->meta_image != ''){
            $meta_image = Upload::find($request->meta_image);
            self::$blog->meta_image = $meta_image->file;
        }
        self::$blog->meta_description = $request->meta_description;
        self::$blog->meta_keyword = $request->meta_keyword;
        self::$blog->status = $request->status;
        self::$blog->save();
        return self::$blog;
    }
    public static function deleteBlog($id){
        self::$blog = Blog::find($id);
        self::$blog->delete();
    }

    public function category(){
        return $this->belongsTo(BlogCategory::class);
    }

    public function blogImages()
    {
        return $this->hasMany(BlogImage::class);
    }
}
