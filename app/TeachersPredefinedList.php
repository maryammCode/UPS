<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TeachersPredefinedList extends Model
{
    protected $fillable = [
        'id','cin','nom','nom_ar','prenom','prenom_ar','grade_fr','grade_en','grade_ar','specialite_fr','specialite_en','specialite_ar','department_id','statut_fr','statut_en','statut_ar','created_by','updated_by','created_at','updated_at','email'
        
    ]; 
}
