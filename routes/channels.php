<?php

use App\Broadcasting\NotificationChannel;
use Illuminate\Support\Facades\Broadcast;
use App\Models\Order;
use App\Models\ApiKey;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
Broadcast::routes();
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('orders.{id}', function ($user,$id) {
    if ($id == 'admin') {
        return true;
    }
    else
    return false;
 
});
// Broadcast::channel('online', function ($user) {
//     $user->profile = $user->profile;
//     return $user;// !empty(User::find($user_id));
 
// });
Broadcast::channel('chat', function ($user) {
    $user->profile = $user->profile;
    return $user;// !empty(User::find($user_id));
 
});
Broadcast::channel('online',NotificationChannel::class);