<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Slide extends Model
{
    protected $fillable = [
        'id','ordre','photo','title_fr','title_en','title_ar','link_btn_1','btn_text_fr','btn_text_en','btn_text_ar','created_by','updated_by','created_at','updated_at','btn_text_fr_2','btn_text_en_2','btn_text_ar_2','link_btn_2','description_fr','description_en','description_ar`'
        
    ];
}
