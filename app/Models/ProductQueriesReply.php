<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQueriesReply extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function question()
    {
        return $this->belongsTo(ProductQueries::class,'queries_id');
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
