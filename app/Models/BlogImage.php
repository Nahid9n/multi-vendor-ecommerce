<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;
    private static $blogImage,$blogImages, $image, $imageName,$imageUrl, $directory ;

    public static function newBlogImage($images, $id)
    {
        $images = explode(',',$images);
        foreach ($images as $image)
        {
            $imageFile = Upload::find($image);
            self::$blogImage                = new BlogImage();
            self::$blogImage->blog_id       = $id;
            self::$blogImage->upload_id       = $imageFile->id;
            self::$blogImage->image         = $imageFile->file;
            self::$blogImage->save();
        }
    }

    public static function updateBlogImage($images, $id)
    {
        if ($images != ''){
            self::$blogImages = BlogImage::where('blog_id', $id)->get();
            foreach (self::$blogImages as $blogImage)
            {
                $blogImage->delete();
            }
            self::newBlogImage($images, $id);
        }

    }
}
