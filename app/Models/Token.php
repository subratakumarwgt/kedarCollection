<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
   protected  $guarded = ['value'];

   public static function getToken($title = ""){
if (!empty($title)) {
    return Token::where('title',$title)->first()->value;
}
else{
    return Token::find(1)->value;
}
   }
}
