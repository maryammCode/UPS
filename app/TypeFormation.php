<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TypeFormation extends Model
{
    protected $fillable = [
        'id','designation_fr','designation_en','designation_ar','created_by','updated_by','created_at','updated_at','description_fr','description_en','description_ar'
        
    ];
}
