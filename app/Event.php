<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    protected $fillable = [
        'id','designation_fr','designation_en','designation_ar','cover','place','organizer','date_start','date_end','description_fr','description_en','description_ar','publier','created_by','updated_by','created_at','updated_at'
    ];

    public function category(){

        return $this->belongsTo(EventCategory::class , 'event_categorie_id');
    }
}
