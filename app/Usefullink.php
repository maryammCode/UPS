<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Usefullink extends Model
{
    protected $fillable = [
        'id','designation_fr','designation_en','designation_ar','link','created_by','updated_by','created_at','updated_at'
        
    ];
}
