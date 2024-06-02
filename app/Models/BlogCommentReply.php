<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCommentReply extends Model
{
    use HasFactory;
    public function comment(){
        return $this->belongsTo(BlogComment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
