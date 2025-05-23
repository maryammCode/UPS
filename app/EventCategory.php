<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EventCategory extends Model
{
    public function parentId()
    {
        return $this->belongsTo(self::class);
    }
}
