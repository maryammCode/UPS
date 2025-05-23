<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class UserChat extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
