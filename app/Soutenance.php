<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Soutenance extends Model
{
    protected $fillable = [
        'id','stage_id','date','horaire_start','horaire_end','salle','created_at','updated_at','created_by','updated_by'

    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function stage(){
        return $this->belongsTo(Stage::class);
    }
    public function session(){
        return $this->belongsTo(SoutenanceSession::class , 'soutenance_session_id');
    }
}
