<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EventsType extends Model
{
    public function parentId()
    {
        return $this->belongsTo(self::class);
    }
}
