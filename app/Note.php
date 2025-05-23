<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Note extends Model
{
    protected $fillable = [
        'id','student_cin','student_name','subject','note','semestre','year_id','created_at','updated_at','deleted_at','created_by','updated_by'

    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
