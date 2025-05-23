<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Diplome extends Model
{
    protected $fillable = [
        'id','name','phone','email','cin','avatar','nationalite','genre','date_naissance','address','linkedin','lieu_naissance','cv','description_fr','description_en','description_ar','created_by','updated_by','created_at','updated_at'
        
    ];
}
