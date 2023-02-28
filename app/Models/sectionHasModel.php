<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sectionHasModel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product(){
        return $this->hasOne(Product::class,'id','model_id')->where("model","Product");
    }
    public function category(){
        return $this->hasOne(Category::class,'id','model_id')->where("model","Category");
    }
    public function collection(){
        return $this->hasOne(Collection::class,'id','model_id')->where("model","Collection");
    }
    public function offer(){
        return $this->hasOne(Offer::class,'id','model_id')->where("model","Offer");
    }
    public function section(){
        return $this->hasOne(Section::class,'id','model_id')->where("model","Section");
    }
    public function item($model){
        $model = "\\App\\Models\\" . $model;
		$model = new $model();
        return $model->where("id",$this->model_id)->first() ;
    }
}
