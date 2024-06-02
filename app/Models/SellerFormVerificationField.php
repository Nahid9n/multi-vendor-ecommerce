<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerFormVerificationField extends Model
{
    use HasFactory;
    private static $sellerVerificationFormField;
    public static function sellerVerificationFormFieldsAdd($request){

            self::$sellerVerificationFormField = SellerFormVerificationField::first();
            self::$sellerVerificationFormField = new SellerFormVerificationField();
            self::$sellerVerificationFormField->label = $request->label;
            self::$sellerVerificationFormField->type = $request->type;
            self::$sellerVerificationFormField->value = json_encode($request->value);
            self::$sellerVerificationFormField->save();
    }
    public static function sellerVerificationFormFieldsUpdate($request,$id){
            self::$sellerVerificationFormField = SellerFormVerificationField::find($id);
            self::$sellerVerificationFormField->label = $request->label;
            self::$sellerVerificationFormField->type = $request->type;
            self::$sellerVerificationFormField->value = json_encode($request->value);
            self::$sellerVerificationFormField->save();
    }
    public static function sellerVerificationFormFieldsDelete($id){
        self::$sellerVerificationFormField = SellerFormVerificationField::find($id);
        self::$sellerVerificationFormField->delete();
    }

}
