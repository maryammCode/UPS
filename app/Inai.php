<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Inai extends Model
{
    protected $fillable = [
        'id','content_fr','content_en','content_ar','logo','created_by','updated_by','created_at','updated_at'
        
    ];
}
