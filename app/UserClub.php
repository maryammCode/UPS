<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserClub extends Model
{
    protected $fillable = [
        'id','club_id','user_id','created_at','updated_at'
        
    ];
}
