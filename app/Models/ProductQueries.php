<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQueries extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function replies()
    {
        return $this->hasMany(ProductQueriesReply::class,'queries_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
