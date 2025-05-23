<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Album extends Model
{
    protected $fillable = [
        'id',
        'designation_fr',
        'designation_en',
        'designation_ar',
        'type',
        'cover',
        'folder',
        'lieu',
        'date',
        'short_description_fr',
        'short_description_ar',
        'description_fr',
        'description_en',
        'description_ar',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'short_description_en',
    ];
}
