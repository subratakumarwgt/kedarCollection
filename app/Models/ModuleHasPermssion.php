<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ModuleHasPermssion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissions(){
        return $this->hasMany(Permission::class,'id','permission_id');
    }
    public function modules(){
        return $this->hasMany(Module::class,'id','module_id');
    }
}
