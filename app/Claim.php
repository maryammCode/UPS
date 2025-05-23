<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class Claim extends Model
{

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsible_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo(ClaimType::class, 'claim_type_id', 'id');
    }
    protected $fillable = [
        'id', 'subject', 'message', 'file', 'created_by', 'updated_by', 'created_at', 'updated_at'

    ];
}
