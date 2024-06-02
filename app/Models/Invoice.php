<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    private static $invoice;
    public static function createInvoice($request,$order){
        self::$invoice = new Invoice();
        self::$invoice->order_id = $order->id;
        self::$invoice->user_id = auth()->user()->id;
        self::$invoice->total_amount = $request->order_total;
        self::$invoice->payment = $request->payment;
        self::$invoice->save();
        return self::$invoice;
    }
}
