<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productHasVariant extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function variant(){
        return $this->hasOne(Variant::class,'id','variant_id');
    }
    

}
