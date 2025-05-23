<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class GroupTp extends Model
{
    protected $fillable = [
        'id','group_td_id','designation_fr','designation_en','designation_ar','created_by','updated_by','created_at','updated_at'
        
    ];
}
