<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Group extends Model
{

    protected $fillable = [
        'id','designation_fr','designation_en','designation_ar','created_by','updated_by','created_at','updated_at'

    ];
    public function groupTd(){
    	return $this->hasMany('App\GroupTd' , 'groupe_id' , 'id');
    }


    public function subjects(){
    	return $this->hasMany('App\Subject');
    }

    public function studentCourses(){
    	return $this->belongsToMany(Course::class, 'cours_groups', 'group_id', 'course_id');
    }

    public function sector(){
    	return $this->belongsTo('App\Sector');
    }


}
