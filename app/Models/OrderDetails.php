<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order(){
        return $this->belongsTo(Order::class,'order_id','order_id');
    }
    public function item(){
        return $this->hasOne(Item::class,'id','item_id');
    }
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
