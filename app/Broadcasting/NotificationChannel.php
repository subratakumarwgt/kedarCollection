<?php

namespace App\Broadcasting;

use App\Http\Controllers\NotifyController;
use App\Models\User;

class NotificationChannel
{
    
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        //
        if($user->role == "admin"){
            $notify = new NotifyController($user);
            $notify->userJoinSequence();
            return true;
        }
        else 
            return false;
       
    }
}
