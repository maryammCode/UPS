<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ConfigLayout extends Model
{


    protected $fillable = [
        'id',
        'title',
        'specific_data',
        'title_bg_banner',
        'route',
        'display_type',
        'widgets',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];
}

