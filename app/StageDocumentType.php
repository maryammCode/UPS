<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class StageDocumentType extends Model
{
    public function rapports(){
        return $this->hasMany(Rapport::class , 'stage_rapport_type_id');
    }
}
