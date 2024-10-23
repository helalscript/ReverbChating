<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['guest_id', 'manager_id', 'name'];
     // A chat room belongs to a guest (user)
     public function guest()
     {
         return $this->belongsTo(User::class, 'guest_id');
     }
 
     // A chat room belongs to a manager (user)
     public function manager()
     {
         return $this->belongsTo(User::class, 'manager_id');
     }
}
