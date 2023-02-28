<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticAsset extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function getAssetsByTitle($title){
        try {
            return json_decode(StaticAsset::where('title',$title)->first()->list_json);
        } catch (\Throwable $th) {
           return [];
        }
        
    }
}
