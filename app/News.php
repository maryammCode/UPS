<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    public function newsCategories()
    {
        // return $this->belongsToMany('App\NewsCategory', 'news_per_categories', 'news_id', 'news_category_id');
        return $this->belongsToMany('App\NewsCategory', 'news_per_categories', 'news_id', 'news_category_id');
    }

    protected $fillable = [
        'id','categorie_id','designation_fr','designation_en','designation_ar','cover','short_description_fr','short_description_en','short_description_ar','description_fr','description_en','description_ar','publier','created_by','updated_by','created_at','updated_at','for'

    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function departments(){
        return $this->hasMany(Department::class);
    }

    public function sectors(){
        return $this->hasMany(Sector::class);
    }
}
