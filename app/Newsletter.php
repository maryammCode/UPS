<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Newsletter extends Model
{
    protected $fillable = [
        'id','email','created_by','updated_by','created_at','updated_at'
        
    ];
}
