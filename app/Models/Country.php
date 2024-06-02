<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    private static $country;
    public static function newCountry($request){
        self::$country = new Country();
        self::$country->name = $request->name;
        self::$country->code = $request->code;
        self::$country->status = $request->status;
        self::$country->save();
    }
    public static function updateCountry($request,$id){
        self::$country = Country::find($id);
        self::$country->name = $request->name;
        self::$country->code = $request->code;
        self::$country->status = $request->status;
        self::$country->save();
    }
    public static function deleteCountry($id){
        self::$country = Country::find($id);
        self::$country->delete();
    }
}
