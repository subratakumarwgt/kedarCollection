<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class,'order_id','order_id');
    }
    public function chargeDetails(){
        return $this->hasMany(OrderCharge::class,'order_id','order_id');
    }
    public function logs(){
        return $this->hasMany(orderLog::class,'order_id','id');
    }
}
