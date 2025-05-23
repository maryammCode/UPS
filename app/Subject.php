<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Subject extends Model
{
    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'subject_id');
    }
    protected $fillable = [
        'id','designation_fr','designation_en','designation_ar','created_by','updated_by','created_at','updated_at'

    ];
}
