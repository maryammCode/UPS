<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Partner extends Model
{
    protected $fillable = [
        'id','designation_fr','designation_en','designation_ar','logo','description_fr','description_en','description_ar','internationalisation','type','created_by','updated_by','created_at','updated_at','link'
        
    ];
}
