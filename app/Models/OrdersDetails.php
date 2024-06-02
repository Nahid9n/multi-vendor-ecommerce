<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;

class OrdersDetails extends Model
{
    use HasFactory;
    private static $orderDetails;
    public static function newOrderDetails($request,$order){
        $cartContent = CartItem::where('user_id', auth()->user()->id)->get();
        foreach ($cartContent as $item){
            self::$orderDetails = new OrdersDetails();
            self::$orderDetails->order_id = $order->id;
            self::$orderDetails->product_id = $item->product_id;
            self::$orderDetails->seller_id = $item->seller_id;
            self::$orderDetails->tax_total = $request->tax_total;
            self::$orderDetails->product_name = $item->name;
            self::$orderDetails->product_color = (isset($item->color_id))? $item->color_id : '';
            self::$orderDetails->product_size = (isset($item->size_id))? $item->size_id : '';
            if ($request->productProduct_id != ''){
                if ($item->product_id == $request->productProduct_id){
                    self::$orderDetails->product_price = $item->price - $request->single_discount;
                    self::$orderDetails->unit_price = $item->qty * self::$orderDetails->product_price;
                }
                else{
                    self::$orderDetails->product_price = $item->price;
                    self::$orderDetails->unit_price = $item->qty * $item->price;
                }
            }
            else{
                self::$orderDetails->product_price = $item->price;
                self::$orderDetails->unit_price = $item->qty * $item->price;
            }
            self::$orderDetails->product_qty = $item->qty;
            self::$orderDetails->variant_id = $item->variant_id;
            self::$orderDetails->save();
            CartItem::where('user_id', auth()->user()->id)->delete();
        }
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function seller(){
        return $this->belongsTo(Seller::class,'seller_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'seller_id');
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
