<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Ressource;

class RessourceReservation extends Model
{
    use HasFactory;

    protected $table = 'ressource_reservations';

    protected $fillable = [
        'user_id',
        'user_name',
        'user_cin',
        'ressource_id',
        'ressource',
        'categorie_id',
        'type_id',
        'dateDebut',
        'dateFin',
        'statut',
        'quantité',
        'created_by',
        'updated_by',
    ];


    public function ressource()
    {
        return $this->belongsTo(Ressource::class, 'ressource_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type()
    {
        return $this->belongsTo(RessourceType::class, 'type_id');
    }
    
}
