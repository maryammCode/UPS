<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class CourseRenderUser extends Model
{
 public function userRenders()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
