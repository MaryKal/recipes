<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipesCategory extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Category','recipes_categories','recipe_id','category_id');
    }
    public function recipe()
    {
        return $this->belongsToMany('App\Recipe','recipes_categories','category_id','recipe_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','users','user_id','recipe_id');
    }
}
