<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingModel extends Model
{
    protected $table = 'billings';
    protected $primaryKey = 'id';
    use HasFactory;
    protected $guarded=[];
}
