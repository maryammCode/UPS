<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ConfigModule extends Model
{




    public function keywords()
    {
        return $this->belongsToMany(ConfigKeyword::class, 'config_module_keywords', 'config_module_id', 'config_keyword_id');
    }
}
