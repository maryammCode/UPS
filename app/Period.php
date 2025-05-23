<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Period extends Model
{
    
    public function getStartHourAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value)->format('H:i'); // Removes seconds
    }
    public function getEndHourAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value)->format('H:i'); // Removes seconds
    }
}
