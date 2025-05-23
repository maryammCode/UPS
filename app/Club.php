<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Club extends Model
{
    protected $fillable = [
        'id','designation_fr','designation_en','designation_ar','cover','logo','domaine','facebook','description_fr','description_en','description_ar','publier','created_by','updated_by','created_at','updated_at','meta_description_fr','meta_description_en','meta_description_ar','n_membres','encadrent','date_creation'
        
    ];
}
