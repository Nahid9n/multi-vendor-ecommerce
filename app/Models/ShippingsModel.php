<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingsModel extends Model
{
    protected $table = 'shippings';
    protected $primaryKey = 'id';
    use HasFactory;
    protected $guarded=[];
}
