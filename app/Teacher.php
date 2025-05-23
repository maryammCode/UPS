<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;
use App\GroupTd;
use App\Models\User;

class Teacher extends Model
{
    protected $fillable = [
        'id','cin','nom','nom_ar','prenom','prenom_ar','name','email','grade_fr','grade_en','grade_ar','specialite_fr','specialite_en','specialite_ar','department_id','statut_fr','statut_en','statut_ar','created_by','updated_by','created_at','updated_at','poste','identifiant_unique'

    ];
    public function subjects(){
        return $this->belongsToMany(Subject::class , 'subject_teachers');
    }
    public function groupes(){
        return $this->belongsToMany(GroupTd::class , 'group_td_teachers');
    }

    public function user(){
        return $this->belongsTo(User::class , 'cin' , 'cin');
    }
    public function grade(){
        return $this->belongsTo(Grade::class , 'id');
    }


}
