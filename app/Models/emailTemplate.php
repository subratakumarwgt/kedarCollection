<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailTemplate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getTemplateByName($name){
        try {
            $template = emailTemplate::where("name",$name)->first();
            if(!empty($template))
            return $template;
            else
            return null;
            
        } catch (\Throwable $th) {
            $p = new Controller;
            $p->logger("email_template_find_issue",$th->getMessage());
        }
        
    }
}
