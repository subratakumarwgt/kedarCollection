<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public $exception_fields = ["category","sub_category","centre_id","status"];
   
   
    public function variants(){
        return $this->hasMany(productHasVariant::class,'product_id','id');
    }
    public function Category(){
        return $this->hasOne(Category::class,'id','category');
    }
    public function variantValues(){
        return $this->hasMany(productHasVariantValue::class,'product_id','id');
    }
    public function images(){
        return $this->hasMany(productHasImage::class,'product_id','id');
    }
    public function offer(){
        return $this->belongsTo(offerHasProduct::class,'id','product_id');
    }
    public function Collection(){
        return $this->belongsTo(collectionHasProduct::class,'id','product_id');
    }
    public function quantities(){
        return $this->hasMany(productHasQuantity::class,'product_id','id');
    }
    public function getFields(){
        return array_filter(array_keys($this->attributesToArray()),function($elem){
           return !(in_array($elem,$this->auto_fields) || in_array($elem,$this->exception_fields)) ;
        });
    }
    public function getExceptions(){
        $array = [
            "centre_id" => [
                "type" =>"select",
                "attributes" => [                   
                    "multiple" => "multiple",
                ],
                "model" => "Centre"
            ],
            "status" => [
                "type" => "select",
                "attributes" => [

                ],
                "values" => [
                    0,1
                ]
            ],
            "category" => [
                "type" => "select",
                "attributes" => [
                    
                ],
                "values" => StaticAsset::getAssetsByTitle("product_categories")
            ],
            "sub_category" => [
                "type" => "select",
                "attributes" => [
                    
                ],
                "values" => StaticAsset::getAssetsByTitle("product_sub_categories")
            ]

        ];
    }
    public static function getProductById($id){
        $product = Product::find($id);
        $product->images = $product->images;
			$product->quantities = $product->quantities;
			$product->variants = $product->variants;
			foreach ($product->variants as  $var) {
               
                if(!empty($var->variant) &&!empty($var->variant->productVariantValues->where("product_id",$product->id)))
                foreach ($var->variant->productVariantValues->where("product_id",$product->id) as $value) {
                    $value->value = @$value->value;
                }
            }
            return $product->toArray();
    }
    
}
