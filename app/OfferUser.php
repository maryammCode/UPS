<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OfferUser extends Model
{
    public function offer(){
    	return $this->belongsTo(Offer::class);
    }
}
