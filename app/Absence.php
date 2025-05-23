<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Absence extends Model
{
    public function seance(){
    	return $this->belongsTo(Period::class ,'period_id');
    }

    public function subject(){
    	return $this->belongsTo(Subject::class );
    }

    // **************  wd  **************
    use HasFactory;

    protected $table = 'absences';

    public function students()
    {
        return $this->hasMany(AbsenceStudent::class, 'absence_id');
    }



     // **************  wd  **************

}
