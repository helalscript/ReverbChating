<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=['room_id' ,'user_id','message','message_type','attachment'];

}
