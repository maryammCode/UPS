<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CoursesGroupTd extends Model
{
    
    protected $fillable = [
        'id','group_td_id','course_id','created_by','updated_by','created_at','updated_at'
        
    ];
}
