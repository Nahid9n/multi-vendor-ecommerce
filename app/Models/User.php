<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */

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

    protected $appends = [
        'profile_photo_url',
    ];
    public function deliveryBoy(){
        return $this->hasOne(DeliveryBoy::class);
    }
    public function ticket(){
        return $this->hasMany(Ticket::class,'sender_id');
    }
    public function ticketReply(){
        return $this->hasMany(TicketReply::class);
    }
    public function queries(){
        return $this->hasMany(ProductQueries::class);
    }
    public function coupon(){
        return $this->hasMany(Coupon::class);
    }
    public function order(){
        return $this->hasMany(Order::class,'deliveryBoy_id');
    }
    public function seller(){
        return $this->hasOne(Seller::class,'user_id');
    }
    public function orderDetail(){
        return $this->hasMany(OrdersDetails::class,'seller_id');
    }
    public function deliverBoyPayment(){
        return $this->hasMany(DeliveryBoyPayment::class,'user_id');
    }
    public function sellerPayment(){
        return $this->hasMany(SellerPayment::class,'user_id');
    }
    public function review(){
        return $this->hasMany(ProductReview::class,'user_id');
    }
    public function sender(){
        return $this->hasMany(Message::class,'sender_id');
    }
    public function receiver(){
        return $this->hasMany(Message::class,'receiver_id');
    }

}
