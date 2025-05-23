<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';  // This makes sure Laravel uses the correct table name

    // If your table does not have timestamps, you can disable it:
    //public $timestamps = false;

    // You can also specify the fillable fields for mass assignment protection: (crf token)
    protected $fillable = [
        'matricule',
        'raisonSocial',
        'numeroTel',
        'adresse',
        'email',
        'nomResponsable',
        'emailResponsable',
        'telResponsable',
    ];


    public function ressources()
{
    return $this->hasMany(Ressource::class);
}

    
    }