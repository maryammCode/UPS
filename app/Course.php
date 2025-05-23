<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    public function chapters(){
    	return $this->hasMany('App\Chapter');
    }

    public function user(){
    	return $this->belongsTo(User::class , 'teacher_cin' , 'cin');
    }
    protected $fillable = [
        'id','year_id','subject_id','designation_fr','designation_en','designation_ar','description_fr','description_en','description_ar','created_by','updated_by','created_at','updated_at','teacher_id','teacher_cin','permission_comment'

    ];

    public function groups(){
        return $this->belongsToMany('App\GroupTd' , 'courses_group_tds');
    }

    public function subject(){
    	return $this->belongsTo('App\Subject');
    }

}
