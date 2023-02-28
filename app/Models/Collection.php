<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function products(){
        return $this->hasMany(collectionHasProduct::class,'collection_id','id');
    }
    public function images(){
        return $this->hasMany(collectionImage::class,'collection_id','id');
    }
    public function getOne()
    {
     
       $this->images = $this->images;
	   foreach ($this->products as $val) {
        $val->product = $val->product;
       }
       return $this;       
    }
}
