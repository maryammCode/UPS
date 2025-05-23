<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ClubUser extends Model
{
    protected $table = 'club_user';

    protected $fillable = [
        'id','club_id','user_id','created_at','updated_at'
        
    ];

}
