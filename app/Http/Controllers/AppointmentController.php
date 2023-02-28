<?php

namespace App\Http\Controllers;

use App\Models\Appointment_log;
use App\Models\Booking;
use App\Models\Centre;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //

    public $appointment;
    public $steps;

    private $current_status;

    private $current_step;


    public function __construct($id){
    	$this->appointment = Booking::find($id);
        
        $this->steps =  $this->appointment->logs;
        // dd($this->steps);
        // $this->setConfirmation();
        // $this->setVisitInfo();
        // $this->setFeedback();
        $this->getCurrentStatus();
    }
    public function getCurrentStatus(){
        try {
            $this->current_status = @$this->appointment->logs->last()->status_name;
            $this->current_step = @$this->appointment->logs->last()->step_no;
            return @$this->appointment->logs->last();
        } catch (\Throwable $th) {
            $this->logger("get_current_status_error",json_encode(["error"=>$th->getMessage(),"data"=>$this->appointment]));
            return false;
        }      

    }
    public function getDetailsByStep($step_no){
        return @$this->appointment->logs->where('step_no',$step_no)->first();
    }
  

    public function setBookingDetails(){
        try {
            $this->appointment->booking_id = uniqid("AP").$this->appointment->id; 
            $this->appointment->save();
            $log = new Appointment_log();
            $log->booking_id = $this->appointment->id;
            $log->update_message = "Booking has been recieved.";
            $log->status_name = "requested";
            $log->section_title = "Booking Details";
            $log->section_content_json = json_encode([
                'appointment_id' => $this->appointment->booking_id,
                'appointment_for'=>$this->appointment->booking_type,
                'schedule_date'=>$this->appointment->booking_date,
                'recieved_on'=>$this->appointment->created_at
            ]);
            $log->step_no = 1;
            $log->icon = 'fa fa-pencil';
            $log->class = 'success';
            if ($log->save()) {
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_booking_details_error",json_encode(["error"=>$th->getMessage(),"data"=>$this->appointment]));
            return false;
        }
      
    }
    public function getBookingDetails(){
        try {
         return $this->appointment->logs->where('step_no',1)->first();
           
        } catch (\Throwable $th) {
            $this->logger("get_booking_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
    public function setConfirmation($time = ""){
        try {
            $this->appointment->booking_time = $time; 
            $this->appointment->save();
            $log = new Appointment_log();
            $log->booking_id = $this->appointment->id;
            $log->update_message = "Booking has been confirmed.";
            $log->status_name = "confirmed";
            $log->section_title = "Confirmation";
            $log->section_content_json = json_encode([
                'appointment_id' => $this->appointment->booking_id,
                'confirmed_on'=>date("Y-m-d H:i:s")
            ]);
            $log->step_no = 2;
            $log->icon = 'fa fa-check';
            $log->class = 'success';
            if ($log->save()) {
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_booking_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
    public function setCancel(){
        try {
            $log = new Appointment_log();
            $log->booking_id = $this->appointment->id;
            $log->update_message = "Booking has been cancelled.";
            $log->status_name = "cancelled";
            $log->section_title = "Confirmation";
            $log->section_content_json = json_encode([
                'appointment_id' => $this->appointment->booking_id,
                'cancelled_on'=>date("Y-m-d H:i:s"),
                'refund'=>'processing'
            ]);
            $log->step_no = 2;
            $log->icon = 'fa fa-close';
            $log->class = 'danger';
            if ($log->save()) {
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_booking_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
    public function setVisitInfo(){
        try {
            $doctor =  Doctor::find($this->appointment->doctor_id);
            $centre =  Centre::find($this->appointment->centre_id);
            if ($this->appointment->booking_type != "check_up") {
             // $diagnosis = null;
            }
            $log = new Appointment_log();
            $log->booking_id = $this->appointment->id;
            $log->update_message = "Visit info set.";
            $log->status_name = "visit info";
            $log->section_title = "Visit Info";
            $log->section_content_json = json_encode([
                'appointment_id' => $this->appointment->booking_id,
                'timming'=> $this->appointment->booking_time,
                'doctor' => $doctor->name,
                'centre' => $centre->name,
                'fees'=>$doctor->full_charge,
                'address'=>$centre->address,
            ]);
            $log->step_no = 3;
            $log->icon = 'fa fa-calendar';
            $log->class = 'success';
            if ($log->save()) {
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_booking_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
     public function setFeedback($feedback=""){
        try {
            $log = new Appointment_log();
            $log->booking_id = $this->appointment->id;
            $log->update_message = "Feedback submited.";
            $log->status_name = "feedback";
            $log->section_title = "Get well soon!";
            $log->section_content_json = json_encode([
                'appointment_id' => $this->appointment->booking_id,
                'visited_on'=>date("Y-m-d H:i:s"),
                'feedback'=>$feedback
            ]);
            $log->step_no = 4;
            $log->icon = 'fa fa fa-comments-o';
            $log->class = 'success';
            if ($log->save()) {
                $this->appointment->review = $feedback;
                return true;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            $this->logger("set_booking_details_error",json_encode(["error"=>$th->getMessage()]));
            return false;
        }
      
    }
    public function getFeedback(){
        try {
            return $this->appointment->logs->where('step_no',4)->first();
              
           } 
        catch (\Throwable $th) {
               $this->logger("get_feed_details_error",json_encode(["error"=>$th->getMessage()]));
               return false;
           }
      
    }
    public function getConfirmation(){
        try {
            return $this->appointment->logs->where('step_no',2)->first();
              
           } 
        catch (\Throwable $th) {
               $this->logger("get_confirm_details_error",json_encode(["error"=>$th->getMessage()]));
               return false;
           }
      
    }
    public function getVisitInfo(){
        try {
            return $this->appointment->logs->where('step_no',3)->first();
              
           } 
        catch (\Throwable $th) {
               $this->logger("get_visit_details_error",json_encode(["error"=>$th->getMessage()]));
               return false;
           }
      
    }


}
