<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cin extends Model
{

    function groupe(){
        return $this->belongsTo('App\Groupe');
    }
    function groupe_td(){
        return $this->belongsTo('App\Sousgroupe');
    }
    function groupe_tp(){
        return $this->belongsTo('App\Sousgroupetp');
    }
    
}
