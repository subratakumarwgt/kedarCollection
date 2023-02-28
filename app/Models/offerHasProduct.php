<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offerHasProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product(){       
        return $this->hasOne(Product::class,'id','product_id');      
    }
    public function offer(){       
        return $this->hasOne(Offer::class,'id','offer_id');      
    }
}
