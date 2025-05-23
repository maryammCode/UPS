<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{

    protected $fillable = ['user_id' , 'text' , 'link' , 'sender_id' , 'seen' , 'is_notif_sent'];
    public function user(){
    	return $this->belongsTo(User::class , 'user_id');
    }
    public function sender(){
    	return $this->belongsTo(User::class , 'sender_id');
    }
}
