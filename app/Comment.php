<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    public function user(){
    	return $this->belongsTo('App\Models\User' , 'user_id' , 'id');
    }
    public function replies(){
    	return $this->hasMany('App\Comment' ,'parent_id' , 'id');
    }

    protected $fillable = [
        'id', 'cuser_id', 'parent_id', 'content', 'course_id', 'created_by', 'updated_by', 'created_at', 'updated_at'
        
    ];
}
