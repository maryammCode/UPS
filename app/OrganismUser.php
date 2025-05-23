<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OrganismUser extends Model
{
    protected $fillable = [
        'user_id',
        'organism_id',
        'poste',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'responsible',
    ];
}
