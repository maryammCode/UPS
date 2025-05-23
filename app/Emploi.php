<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    //
    protected $fillable = [
        'id','type','link','from','note','created_at','updated_at','deleted_at','created_by','updated_by'
        
    ];
}
