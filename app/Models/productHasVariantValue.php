<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productHasVariantValue extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function value(){
        return $this->hasOne(variantHasValue::class,'id','variant_value_id');
    }

}
