<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Support\Facades\Route;

class SubjectDocument extends Model
{

    protected $fillable = [
        'id','designation_fr','designation_en','designation_ar','created_by','updated_by','created_at','updated_at'

    ];

    public function documents(){


    	return $this->hasMany('App\Document' ,'subject_document_id' , 'id')->where('documents.for' , 'LIKE' , '%'.Auth::user()->role->name.'%');

    }



    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    use Translatable;

    protected $translatorMethods = [
        'link' => 'translatorLink',
    ];


    protected $guarded = [];

    protected $translatable = ['title'];

  /*   public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->menu->removeMenuFromCache();
        });

        static::saved(function ($model) {
            $model->menu->removeMenuFromCache();
        });

        static::deleted(function ($model) {
            $model->menu->removeMenuFromCache();
        });
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')
            ->with('children');
    }

    public function menu()
    {
        return $this->belongsTo(Voyager::modelClass('Menu'));
    }

    public function link($absolute = false)
    {
        return $this->prepareLink($absolute, $this->route, $this->parameters, $this->url);
    }

    public function translatorLink($translator, $absolute = false)
    {
        return $this->prepareLink($absolute, $translator->route, $translator->parameters, $translator->url);
    }

    protected function prepareLink($absolute, $route, $parameters, $url)
    {
        if (is_null($parameters)) {
            $parameters = [];
        }

        if (is_string($parameters)) {
            $parameters = json_decode($parameters, true);
        } elseif (is_array($parameters)) {
            $parameters = $parameters;
        } elseif (is_object($parameters)) {
            $parameters = json_decode(json_encode($parameters), true);
        }

        if (!is_null($route)) {
            if (!Route::has($route)) {
                return '#';
            }

            return route($route, $parameters, $absolute);
        }

        if ($absolute) {
            return url($url);
        }

        return $url;
    } */

    public function getParametersAttribute()
    {
        //return json_decode($this->attributes['parameters']);
    }

    public function setParametersAttribute($value)
    {
        /* if (is_array($value)) {
            $value = json_encode($value);
        }

        $this->attributes['parameters'] = $value; */
    }

    public function setUrlAttribute($value)
    {
        if (is_null($value)) {
            $value = '';
        }

        $this->attributes['url'] = $value;
    }

    /**
     * Return the Highest Order Menu Item.
     *
     * @param number $parent (Optional) Parent id. Default null
     *
     * @return number Order number
     */
    public function highestOrderMenuItem($parent = null)
    {
        $order = 1;

        $item = $this->where('parent_id', '=', $parent)
            ->orderBy('order', 'DESC')
            ->first();

        if (!is_null($item)) {
            $order = intval($item->order) + 1;
        }

        return $order;
    }
}
