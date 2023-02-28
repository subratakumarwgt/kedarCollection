<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function items($model = null){
        if(empty($model))
        return $this->hasMany(pageHasModel::class,'page_id','id');
        else
        return $this->hasMany(pageHasModel::class,'page_id','id')->where("model",$model);
    }
    public function itemGroups(){
        return pageHasModel::where('page_id',$this->id)->groupBy("model")->orderBy("page_id")->get()->pluck("model");
    }
    public static function getSectionBySlug($slug){
        return Section::where("slug",$slug)->first();
    }
}
