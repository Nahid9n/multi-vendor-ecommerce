<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSlider extends Model
{
    use HasFactory;
    private static $slider;

    public static function newSlider($request){
        self::$slider = new WebsiteSlider();
        self::$slider->title = $request->title;
        self::$slider->slogan = $request->slogan;
        if ($request->banner != ''){
            $banner = Upload::find($request->banner);
            self::$slider->banner = $banner->file;
        }
        if ($request->image != ''){
            $banner = Upload::find($request->image);
            self::$slider->image = $banner->file;
        }
        self::$slider->meta = $request->meta;
        self::$slider->meta_description = $request->meta_description;
        self::$slider->status = $request->status;
        self::$slider->save();
    }
    public static function updateSlider($request,$id){
        self::$slider = WebsiteSlider::find($id);
        self::$slider->title = $request->title;
        self::$slider->slogan = $request->slogan;
        if ($request->banner != ''){
            $banner = Upload::find($request->banner);
            self::$slider->banner = $banner->file;
        }
        if ($request->image != ''){
            $banner = Upload::find($request->image);
            self::$slider->image = $banner->file;
        }
        self::$slider->meta = $request->meta;
        self::$slider->meta_description = $request->meta_description;
        self::$slider->status = $request->status;
        self::$slider->save();
    }
    public static function deleteSlider($id){
        self::$slider = WebsiteSlider::find($id);
        self::$slider->delete();
    }
}
