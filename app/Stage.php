<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stage extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id','candidat_1_id','candidat_2_id','candidat_3_id','entreprise_id','candidat_1_name','candidat_2_name','candidat_3_name','encadrant_name','sujet','domaine','description','duree','start','end','rapport','type','level','etat','created_by','updated_by','created_at','updated_at','encadrant_id','avis_encadrant','avis_jury','remarque_jury','resultat_jury','remarque_encadrant','slug'

    ];
    public function year(){
    	return $this->belongsTo(Year::class,'year_id','id');
    }
    public function encadrant(){
    	return $this->belongsTo(User::class,'encadrant_id','id');
    }

    public function entreprise(){
    	return $this->belongsTo(Entreprise::class,'entreprise_id','id');
    }
    public function responsible(){
    	return $this->belongsTo(User::class,'responsible_id','id');
    }

    public function candidat_1(){
    	return $this->belongsTo(User::class,'candidat_1_id','id');
    }

    public function candidat_2(){
    	return $this->belongsTo(User::class,'candidat_2_id','id');
    }


    public function candidat_3(){
    	return $this->belongsTo(User::class,'candidat_3_id','id');
    }

    public function stageType(){
        return $this->belongsTo(StageType::class,'stage_type_id','id');
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function soutenance(){
        return $this->hasOne(Soutenance::class);
    }
}
