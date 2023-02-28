<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function variantValues(){
        return $this->hasMany(variantHasValue::class,'variant_id','id');
    }
    public function productVariantValues(){
        return $this->hasMany(productHasVariantValue::class,'variant_id','id');
    }
    
}
