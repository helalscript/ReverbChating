<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('chat.{roomId}', function ($user, $roomId) {
    return true;
});
// Broadcast::channel('chat.{roomId}', function ($user, $roomId) {
//     return (int) $user->room_id === (int) $roomId;
// });
// Broadcast::channel('system-maintenance',function(){
//     return true;
// });
Broadcast::channel('sent-messages.{roomId}',function(){
    return true;
});