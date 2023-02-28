<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function modper(){
        return $this->hasMany(ModuleHasPermssion::class,'module_id','id');
    }
    public function sub_modules(){
        return $this->hasMany(Module::class,'parent_id','id');
    }
}
