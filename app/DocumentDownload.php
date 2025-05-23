<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DocumentDownload extends Model
{
    protected $fillable = [
        'id','user_id','document_id','subject_id','created_at','updated_at'
        
    ];
}
