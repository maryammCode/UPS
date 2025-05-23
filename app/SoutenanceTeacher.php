<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SoutenanceTeacher extends Model
{
    protected $fillable = [
        'id','teacher_id','soutenance_id','user_name','poste','etat','created_by','updated_by','created_at','updated_at'
        
    ];
}
