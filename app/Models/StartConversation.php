<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartConversation extends Model
{
    protected $table = 'conversations';
    protected $primaryKey = 'id';
    use HasFactory;
    protected $guarded=[];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
