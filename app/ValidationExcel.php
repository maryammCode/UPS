<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ValidationExcel extends Model
{
    protected $fillable = [
        'id','designation','slug','created_at','updated_at'
        
    ];
}
