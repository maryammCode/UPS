<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Laureate extends Model
{
    protected $fillable = [
        'id','year_id','name','email','publier','avatar','sector','score','created_by','updated_by','created_at','updated_at'
        
    ];
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
}
