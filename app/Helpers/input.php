<?php

namespace App\Helpers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class Input extends helper {
    public $name;

    public $title;

    public $id;

    public $type;

    public Array $options;

    public $col;

    public $label;

    public $attributes;

    public function __construct($label,$name,$id){
        
    }


}