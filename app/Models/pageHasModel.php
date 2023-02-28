<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pageHasModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function section(){
        return $this->hasOne(Section::class,'id','model_id')->where("model","Section");
    }
}
