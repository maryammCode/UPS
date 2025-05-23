<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OrganizationChart extends Model
{
    public function child(){
        return $this->belongsTo("OrganizationChart" );
    }
}
