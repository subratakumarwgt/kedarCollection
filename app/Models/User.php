<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use NotificationChannels\WebPush\HasPushSubscriptions;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasPushSubscriptions ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile(){
        return $this->hasOne(Profile::class,'user_id','id');
    }
    public function address(){
        return $this->hasOne(Address::class,'user_id','id');
    }
    public function bookings(){
        return $this->hasMany(Booking::class,'user_id','id');
    }
    public function cart(){
        return $this->hasMany(Cart::class,'user_id','id');
    }
    public function orders(){
        return $this->hasMany(Order::class,'user_id','id');
    }
    public function onlineStatus(){
        return $this->hasOne(onlineUsers::class,'user_id','id');
    }
    // public function updatePushSubscription($endpoint, $key, $token){
    //     try {
    //         $push =  pushSubscription::firstOrNew(array('endpoint' => $endpoint,'public_key' => $key , "auth_token" => $token , "guest_id"=> $this->id));
      
    //     return $push->update(array('endpoint' => $endpoint,'public_key' => $key , "auth_token" => $token , "guest_id"=> $this->id)) ? "subscription added" : json_encode($this);
    //    } catch (\Throwable $th) {
    //     return $th->getMessage();
    //    }
    // }
}
