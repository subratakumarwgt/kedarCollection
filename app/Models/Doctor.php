<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Doctor extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function visits(){
        return $this->hasOne(Visits::class,'doctor_id','id');
    }
    public function slots(){
        return $this->hasMany(Slots::class,'doctor_id','id');
    }
    
}
