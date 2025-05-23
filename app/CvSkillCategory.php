<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CvSkillCategory extends Model
{
    public function skills(){
    	return $this->hasMany('App\CvSkill' , 'cv_skill_category_id' , 'id');
    }
}
