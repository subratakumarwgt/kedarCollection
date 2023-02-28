<?php

namespace App\Models\Components;

use App\Models\StaticAsset;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compMain extends Model
{
    use HasFactory;
  
    protected $guarded = [];

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
                    0 => "inactive",
                    1 => "active"
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
    
}
