<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TenderSubmission extends Model
{
    protected $fillable = [
        'id',
        'tender_id',
        'entreprise_id',
        'files',
    ];
}
