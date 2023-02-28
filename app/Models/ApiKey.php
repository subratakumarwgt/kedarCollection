<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;

    public static function getApiByKey($key,$user_type){
         return ApiKey::where('key_name',$key)->where('user_type',$user_type)->first()->api;
    }
}
