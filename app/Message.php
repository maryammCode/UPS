<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $fillable = [
        'id','sender_id','receiver_id','content','seen','files','created_at','updated_at','user_id','chat_id'
        
    ];
    
}
