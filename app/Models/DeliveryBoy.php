<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryBoy extends Model
{
    use HasFactory;
    protected $guarded = [];
    private static $deliveryBoy,$image,$imageName,$imageUrl,$extension,$directory;
    public static function getImage($request){
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'uploads/delivery-boy/';
        self::$image->move(self::$directory , self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function addDeliveryBoy($request){
        self::$deliveryBoy = new DeliveryBoy();
        self::$deliveryBoy->name = $request->name;
        self::$deliveryBoy->email = $request->email;
        self::$deliveryBoy->role = $request->role;
        self::$deliveryBoy->role_id = $request->role_id;
        self::$deliveryBoy->status = $request->status;
        self::$deliveryBoy->save();


    }
    public static function updateDeliveryBoy($request,$id){
        self::$deliveryBoy = DeliveryBoy::find($id);
        $user = User::where('id',self::$deliveryBoy->user_id)->first();
        $user->name = $request->name;
        $user->save();
        if ($request->file('image')){
            if (file_exists(self::$deliveryBoy->image)){
                unlink(self::$deliveryBoy->image);
            }
            self::$deliveryBoy->image = self::getImage($request);
        }
        self::$deliveryBoy->name = $request->name;
        self::$deliveryBoy->email = $request->email;
        self::$deliveryBoy->mobile = $request->mobile;
        self::$deliveryBoy->blood = $request->blood;
        self::$deliveryBoy->gender = $request->gender;
        self::$deliveryBoy->date = $request->date;
        self::$deliveryBoy->present_address = $request->present_address;
        self::$deliveryBoy->permanentAddress = $request->permanentAddress;
        self::$deliveryBoy->short_description = $request->short_description;
        self::$deliveryBoy->biography = $request->biography;
        self::$deliveryBoy->experience = $request->experience;
        self::$deliveryBoy->facebook = $request->facebook;
        self::$deliveryBoy->twitter = $request->twitter;
        self::$deliveryBoy->linkedIn = $request->linkedIn;
        self::$deliveryBoy->website = $request->website;
        self::$deliveryBoy->status = $request->status;
        self::$deliveryBoy->save();
    }
    public static function updateInfo($request,$id){
        self::$deliveryBoy = DeliveryBoy::where('user_id',$id)->first();
        self::$deliveryBoy->name = $request->name;
        if ($request->file('image')){
            if (file_exists(self::$deliveryBoy->image)){
                unlink(self::$deliveryBoy->image);
            }
            self::$deliveryBoy->image = self::getImage($request);
        }
        self::$deliveryBoy->save();

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->file('image')){
            if (file_exists($user->image)){
                unlink($user->image);
            }
            $user->image = self::getImage($request);
        }
        $user->save();

    }

    public static function deleteDeliveryBoy($id){
        self::$deliveryBoy = DeliveryBoy::find($id);
        if (file_exists(self::$deliveryBoy->image)){
            unlink(self::$deliveryBoy->image);
        }
        self::$deliveryBoy->delete();
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order(){
        return $this->belongsTo(Order::class,'deliveryBoy_id','id');
    }
}
