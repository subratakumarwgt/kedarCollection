<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;
use App\Models\Contact;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\Product;
use App\Models\Slots;
use App\Models\StaticAsset;
use App\Models\ModuleHasPermssion as ModPer;
use App\Models\User;
use App\Models\Module;
use App\Models\onlineUsers;
use App\Models\Order;
use App\Notifications\webPushNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Throwable;


class NotifyController extends Controller
{
    //
    public $user;

    public $notification;

    private $errorMessage;

    private $log_slug;


    public function __construct(User $user = null){
    if(!empty($user))
    $this->user = $user;
    $this->errorMessage = "NotifyController_error_ ";

    }
    private function notifyUser(User $user,webPushNotification $notification){
        try{
            Notification::send($user,$notification);
            return true;
        }
        catch(Throwable $th){
            $this->log_slug = $this->errorMessage;
            $this->errorMessage = $this->log_slug."_notification_send";
            $this->logger($this->log_slug,$this->errorMessage);
            return false;
        }
      
    }
    private function getNotifications($is_unmarked = true){
        if($is_unmarked){
            return $this->user->unreadNotifications;
        }
        else{
            return $this->user->notifications;
        }
    }
    public function userJoinSequence(){
        $this->log_slug = $this->errorMessage;
		$this->errorMessage = $this->log_slug."_join_sequence";
        $this->changeUserStatus();
        $unreadNotifications = $this->getNotifications();
        // dd($unreadNotifications);

        $unRead = [];
        foreach ($unreadNotifications as  $notification) {
            $unRead = $notification->data;
            // dd($notifications);
            try{
               $this->notifyUser($this->user,new webPushNotification(@$unRead["title"],@$unRead["body"],@$unRead["action"],@$unRead["url"]));
               $notification->markAsRead();
            }
            catch(Throwable $th){
               echo $th->getMessage();
            }
             
        }
        
        
        
    } 
    public function changeUserStatus($status = 1){
        $this->log_slug = $this->errorMessage;
		$this->errorMessage = $this->log_slug."_change_status";
        try {
            if(empty($this->user->userStatus)){
                onlineUsers::create([
                    "user_id" =>$this->user->id ,
                    "is_online" => $status
                ]);
                return true;
             }
             else{
              return  $this->user->userStatus->update([
                    "is_online" => $status
                ]);
             }
        } catch (\Throwable $th) {
            $this->logger($this->log_slug,$this->errorMessage);
            return false;
        }
     
     
    }

    public function sendOrderNotification(Order $order){
        $adminNotification = new webPushNotification("New order: ".$order->order_id,"New order recieved from: ".$order->user_contact,"Confirm Order","");
        $userNotification = new webPushNotification("Order Placed successfully: ".$order->order_id,"Thank you for ordering from: "
        ,"Confirm Order","");

        $admin_users = User::where("role","admin")->get();
        $user = User::where("contact",$order->user_contact)->first();
        if($user)
        $this->notifyUser($user,$userNotification);
        foreach ($admin_users as  $user) {
        $this->notifyUser($user,$adminNotification);
        }  

    }


    

}
