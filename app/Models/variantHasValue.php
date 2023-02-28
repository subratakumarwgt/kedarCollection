<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variantHasValue extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function productVariant(){
        return $this->belongsTo(productHasVariant::class,'variant_value_id','id');
    }
    public function variant(){
        return $this->belongsTo(Variant::class,'variant_id','id');
    }

}
