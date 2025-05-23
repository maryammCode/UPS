<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Publication extends Model
{
    protected $fillable = [
        'id','designation_fr','designation_en','designation_ar','cover','description_fr','description_en','description_ar','publier','created_by','updated_by','created_at','updated_at','auteur','coauteurs`'
        
    ];
}
