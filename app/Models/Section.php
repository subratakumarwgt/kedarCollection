<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function items($model = null){
        if(empty($model))
        return $this->hasMany(sectionHasModel::class,'section_id','id');
        else
        return $this->hasMany(sectionHasModel::class,'section_id','id')->where("model",$model);
    }
    public function itemGroups(){
        return sectionHasModel::where('section_id',$this->id)->groupBy("model")->get()->pluck("model");
    }
    public static function getSectionBySlug($slug){
        return Section::where("slug",$slug)->first();
    }


}
