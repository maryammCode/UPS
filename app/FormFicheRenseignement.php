<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormFicheRenseignement extends Model
{
    //

    protected $fillable = [
        'id','diplome_prepare','specialite','etat','niveau_etude','year_id','created_at','updated_at','deleted_at','student_id','group_id','etablissement_educatif_precedente','created_by','updated_by','student_name','group_designation','group_td_designation','group_tp_designation','group_td_id','group_tp_id','adresse','code_postale','profession','employeur','etat_civil','etat_militaire','besoin_specifique','description_besoin_specifique','adresse_parents','code_postale_parents','tel_parents','conjoint','profession_conjoint','etablissement_profession_conjoint','nombre_enfants','specialite_educatif_precedent','phone','avatar','niveau_etab_educatif_precedent','numero_inscription'
        
    ]; 
}
