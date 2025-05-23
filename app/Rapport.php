<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Rapport extends Model
{
    public function StageDocumentType(){
        return $this->belongsTo(StageDocumentType::class , 'stage_rapport_type_id');
    }
}
