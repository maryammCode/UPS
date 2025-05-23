<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Coordinate extends Model
{
    
    protected $fillable = [
        'id','current_year_id','designation_fr','designation_en','designation_ar','abbreviation','adresse_fr','adresse_en','adresse_ar','phone','phone_2','fax','email','cover','university','ministere','facebook_link','youtube_link','google_link','favicon','logo','logo_footer','short_description_fr','short_description_en','short_description_ar','description_fr','description_en','description_ar','created_by','updated_by','created_at','updated_at','location','twitter_link','title_mot_du_directeur','description_mot_directeur','cover_mot_du_directeur','video','name_page_facebook'
 
    ];  
}
