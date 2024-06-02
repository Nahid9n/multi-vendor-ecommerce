<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];
    private static $order;
    public static function newOrder($customer,$request, $order_number,$order_code){
        self::$order = new Order();
        self::$order->user_id = auth()->user()->id;
        self::$order->phone = $request->phone;
        self::$order->order_number = $order_number;
        self::$order->order_code = $order_code;
        self::$order->total_price = $request->order_total;
        self::$order->total_shipping = $request->shipping_total;
        self::$order->order_date = date('Y-m-d');
        self::$order->delivery_address = $request->delivery_address;
        self::$order->payment_method = $request->payment;
        self::$order->order_number = $order_number;
        if ($request->usedCoupon_id != ''){
            $coupon = Coupon::find($request->usedCoupon_id);
            self::$order->coupon_code = $coupon->coupon_code;
            self::$order->coupon_discount = $request->discount;
        }
        self::$order->save();

        return self::$order;
    }

    public function customer(){
        return $this->belongsTo(CustomerAuth::class);
    }
    public function orderDetails(){
        return $this->hasMany(OrdersDetails::class);
    }

    public function orderWithDetails(){
        return $this->belongsTo(OrdersDetails::class, 'user_id', 'id')->withTrashed();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function deliveryBoy(){
        return $this->belongsTo(User::class,'deliveryBoy_id');
    }

}
