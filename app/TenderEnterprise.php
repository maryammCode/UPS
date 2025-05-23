<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TenderEnterprise extends Model
{

    protected $fillable = [
        'id',
        'tender_id',
        'entreprise_id',
        'url_file',
        'created_at',
        'updated_at'
    ];
}
