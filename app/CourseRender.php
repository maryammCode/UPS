<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CourseRender extends Model
{
    public function groupTd(){
        return $this->belongsTo(GroupTd::class);
    }


}
