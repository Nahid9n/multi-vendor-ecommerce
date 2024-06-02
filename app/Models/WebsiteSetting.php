<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;
    private static $website;

    public static function updateWebsiteDetails($request,$id){
        self::$website = WebsiteSetting::find($id);
        if ($request->banner != ''){
            $banner = Upload::find($request->banner);
            self::$website->banner = $banner->file;
        }
        if ($request->icon != ''){
            $icon = Upload::find($request->icon);
            self::$website->icon = $icon->file;
        }
        if ($request->logo != ''){
            $logo = Upload::find($request->logo);
            self::$website->logo = $logo->file;
        }
        self::$website->slogan = $request->slogan;
        self::$website->email = $request->email;
        self::$website->mobile = $request->mobile;
        self::$website->address = $request->address;
        self::$website->about = $request->about;
        self::$website->facebook = $request->facebook;
        self::$website->twitter = $request->twitter;
        self::$website->youtube = $request->youtube;
        self::$website->linkedIn = $request->linkedIn;
        self::$website->map = $request->map;
        self::$website->status = $request->status;
        self::$website->save();
    }

}
