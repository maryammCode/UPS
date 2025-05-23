<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Offer extends Model
{
    protected $fillable = [
        'id','company','designation_fr','designation_en','designation_ar','description_fr','description_en','description_ar','type','phone','address','responsible','email','created_by','updated_by','created_at','updated_at','cover','company_location'

    ];

    public function offer_users(){
        return $this->hasMany('App\OfferUser');
    }

    public function entreprise(){
        return $this->belongsTo('App\Entreprise');
    }
    public function offerType(){
        return $this->belongsTo('App\OfferType');
    }
}
