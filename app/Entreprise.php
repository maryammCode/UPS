<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class Entreprise extends Model
{

    protected $fillable = [
        'id','designation','logo','phone','email','address','fax','description','location','responsable_name','created_at','updated_at','created_by','updated_by'
    ];


    public function users(){
        return $this->hasMany(User::class);
    }

    public function trainers(){
        return $this->hasMany(Stage::class);
    }

    public function domaine(){
        return $this->belongsTo(Domaine::class);
    }
}
