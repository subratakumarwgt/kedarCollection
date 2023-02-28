<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collectionHasProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product(){       
        return $this->hasOne(Product::class,'id','product_id');      
    }
    public function collection(){       
        return $this->hasOne(Collection::class,'id','offer_id');      
    }
}
