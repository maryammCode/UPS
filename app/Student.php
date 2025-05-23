<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    protected $fillable = [
        'id','annee_bac','section_bac','session_bac','mention_bac','moyenne_bac','pays_bac','nom_pere','prenom_pere','profession_pere','etablissement_prof_pere','nom_mere','prenom_mere','profession_mere','etablissement_prof_mere','nom_jeune_fille','created_at','updated_at','deleted_at','created_by','updated_by'
        
    ]; 
}
