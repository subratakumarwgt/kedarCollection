<?php
namespace App\Http\Traits;
use App\Models\emailTemplate;
trait StudentTrait {
    public function __construct(){
        // Fetch all the students from the 'student' table.
        $student = emailTemplate::all();
        return view('welcome')->with(compact('student'));
    }
}