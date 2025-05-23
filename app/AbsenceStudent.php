<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AbsenceStudent extends Model
{

     // **************  wd  **************

    use HasFactory;

    protected $table = 'absence_students';

    public function absence()
    {
        return $this->belongsTo(Absence::class, 'absence_id');
    }
     // **************  wd  **************
}
