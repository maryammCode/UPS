<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SubjectTeacher extends Model
{
    protected $fillable = [
        'id','subject_id','teacher_id','created_by','updated_by','created_at','updated_at'
        
    ];
}
