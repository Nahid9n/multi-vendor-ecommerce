<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerWallet extends Model
{
    protected $table = 'customer_wallets';
    protected $primaryKey = 'id';
    use HasFactory;
    protected $guarded=[];
}
