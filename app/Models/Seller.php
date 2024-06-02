<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Seller extends Authenticatable
{
    use HasFactory;

    protected $guarded  = [];
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] =ucfirst($value);
    }
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] =ucfirst($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] =strtolower($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] =ucfirst($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =ucfirst($value);
    }
    public function orderDetail()
    {
        return $this->hasMany(OrdersDetails::class,'seller_id');
    }




}
