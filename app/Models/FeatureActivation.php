<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Ramsey\Collection\Map\replace;

class FeatureActivation extends Model
{
    use HasFactory;
//    private static $feature;
//
//    public static function newFeature($request){
//
//        self::$feature = new FeatureActivation();
//        self::$feature->name = ucfirst(str_replace(' ', '_', $request->name));
//        self::$feature->type = $request->type;
//        self::$feature->status = $request->status;
//        self::$feature->save();
//    }
//    public static function updateFeature($request,$id){
//        self::$feature = FeatureActivation::find($id);
//        self::$feature->name = ucfirst(str_replace(' ', '_', $request->name));
//        self::$feature->type = $request->type;
//        self::$feature->status = $request->status;
//        self::$feature->save();
//    }
//    public static function deleteFeature($id){
//        self::$feature = FeatureActivation::find($id);
//        self::$feature->delete();
//    }
}
