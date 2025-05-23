<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Specialite extends Model
{
    protected $fillable = [
        'id','designation_fr','designation_en','designation_ar','created_at','updated_at'
        
    ];
}
