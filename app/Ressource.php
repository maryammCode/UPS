<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    protected $table = 'ressources';
    
    protected $fillable = [
        'ressource_category_id',
        'designation_fr',
        'designation_en',
        'designation_ar',
        'image',
        'prix',
        'quantité',
        'supplier_id',
        'description_fr',	
        'description_en',	
        'description_ar',
  ];

    /**
     * Relation: A resource belongs to a supplier
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    /**
     * Relation: A resource belongs to a category
     */
    public function category()
    {
        return $this->belongsTo(RessourceCategory::class, 'ressource_category_id');
    }
}

