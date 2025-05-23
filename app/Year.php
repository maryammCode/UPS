<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;


class Year extends Model
{
    protected $fillable = [
        'id','designation','nb_student','nb_teacher','nb_personnel','nb_club','created_by','updated_by','created_at','updated_at'

    ];


    public function stages(){
        return $this->hasMany(Stage::class , 'year_id')->where('encadrant_id',Auth::user()->id);
    }

    public function stagesCompany(){
        return $this->hasMany(Stage::class , 'year_id')->where('entreprise_id',Auth::user()->entreprise_id);
    }
}
