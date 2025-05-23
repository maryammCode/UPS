<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Formation extends Model
{
    protected $fillable = [
        'id','type_id','designation_fr','designation_en','designation_ar','plan_etude','description_fr','description_en','description_ar','created_by','updated_by','created_at','updated_at','specialite_id' 
    ];
}
