<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function expenseDetails(){
        return $this->hasMany(DailyExpense::class,'expense_id','id');
    }


}
