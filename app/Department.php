<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Department extends Model
{
    public function chef(){
    	return $this->belongsTo('App\Models\User' , 'chef_id' , 'id');
    }

    protected $fillable = [
        'id','chef_id','designation_fr','designation_en','designation_ar','cover','description_fr','description_en','description_ar','created_by','updated_by','created_at','updated_at'

    ];


    public function sectors(){
        return $this->hasMany(Sector::class);
    }
}
