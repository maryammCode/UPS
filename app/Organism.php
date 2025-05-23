<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Organism extends Model
{
    public function typeOrganisme(){
    	return $this->belongsTo(OrganismType::class , 'organism_type_id' , 'id');
    }
    protected $fillable = [
        'id','cover','designation_fr','designation_en','designation_ar','description_fr','description_en','description_ar','logo','facebook','created_by','updated_by','created_at','updated_at','cover','company_location'
        
    ];
}
