<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RessourceType extends Model
{
    use HasFactory;

    protected $table = 'ressource_type'; // Make sure this matches your DB

    protected $fillable = ['nom'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'type_id');
    }
}

