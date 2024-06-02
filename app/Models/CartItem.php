<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function size(){
        return $this->belongsTo(Size::class,'size_id', 'id');
    }
    public function color(){
        return $this->belongsTo(Color::class,'color_id', 'id');
    }
    
}
