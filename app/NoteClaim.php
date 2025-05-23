<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class NoteClaim extends Model
{


    protected $fillable = [
        'user_id',
        'note_id',
        'description',
        'etat',
    ];
}
