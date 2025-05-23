<?php

namespace App;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;


class Personal extends Model
{
    protected $fillable = [
        'id','grade_fr','grade_en','grade_ar','affichage_in_front','created_by','updated_by','created_at','updated_at','service_fr','service_en','service_ar','fonction_fr','fonction_en','fonction_ar'

    ];

    // public function AgentAdministratif(){
    // 	return $this->belongsTo(User::class ,'id');
    // }

    public function user(){
    	return $this->belongsTo(User::class ,'cin','cin');
    }
}
