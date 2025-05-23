<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','designation_fr','designation_en','designation_ar','order','created_at','updated_at','deleted_at','icon','link','color','align','model_name','created_by','updated_by'
        
    ];
}
