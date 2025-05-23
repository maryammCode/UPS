<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    protected $fillable = [
        'id', 'theme_id', 'designation_fr', 'designation_en', 'designation_ar', 'cover', 'isbn', 'author', 'description_fr', 'description_en', 'description_ar', 'created_by', 'updated_by', 'created_at', 'updated_at'

    ];

    public function theme(){
        return $this->belongsTo(Theme::class);
    }
}
