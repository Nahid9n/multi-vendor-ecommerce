<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerPackage extends Model
{
    use HasFactory;
    private static $package;

    public static function newPackage($request){
        self::$package = new SellerPackage();
        self::$package->package_name = $request->package_name;
        self::$package->amount = $request->amount;
        self::$package->product_upload = $request->product_upload;
        self::$package->duration = $request->duration;
        if ($request->package_logo != ''){
            $package_logo = Upload::find($request->package_logo);
            self::$package->package_logo = $package_logo->file;
        }
        self::$package->status = $request->status;
        self::$package->save();
    }
    public static function updatePackage($request,$id){
        self::$package = SellerPackage::find($id);
        if ($request->package_logo != ''){
            $package_logo = Upload::find($request->package_logo);
            self::$package->package_logo = $package_logo->file;
        }
        self::$package->package_name = $request->package_name;
        self::$package->amount = $request->amount;
        self::$package->product_upload = $request->product_upload;
        self::$package->duration = $request->duration;
        self::$package->status = $request->status;
        self::$package->save();
    }
    public static function deletePackage($id){
        self::$package = SellerPackage::find($id);
        self::$package->delete();
    }
}
