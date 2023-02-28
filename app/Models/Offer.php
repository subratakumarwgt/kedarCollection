<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function products(){
        return $this->hasMany(offerHasProduct::class,'offer_id','id');
    }
    public function images(){
        return $this->hasMany(offerImage::class,'offer_id','id');
    }
    public function detail(){
        return $this->hasOne(offerDetail::class,'offer_id','id');
    }
    public function getOne()
    {
       $offer = $this;
       $offer->images = $offer->images;
       $offer->detail = $offer->detail;
	   foreach ($offer->products as $val) {
        $val->product = $val->product;
       }
       return $offer;       
    }
    public function getRevenue(){
        return 0;
    }
}
