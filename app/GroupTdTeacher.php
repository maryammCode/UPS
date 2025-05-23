<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class GroupTdTeacher extends Model
{
    protected $fillable = [
        'id','teacher_id','group_td_id','created_by','updated_by','created_at','updated_at'
        
    ];
    
}
