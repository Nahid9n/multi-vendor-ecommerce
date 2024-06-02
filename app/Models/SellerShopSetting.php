<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerShopSetting extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function shop_setting()
    {
        return $this->belongsTo(Seller::class,'seller_id','id');
    }
}
