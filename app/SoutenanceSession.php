<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SoutenanceSession extends Model
{
    public function soutenances(){
        return $this->hasMany(Soutenance::class);
    }
}
