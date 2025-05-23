<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Sector extends Model
{
   public function sectorType(){
    return $this->belongsTo(SectorType::class);
   }
}
