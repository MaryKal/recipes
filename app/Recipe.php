<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'describe',
        'image',
        'likes',
    ];
    public function categories()
    {
        return $this->belongsToMany('App\Category','recipes_categories','recipe_id','category_id');
    }
   
}
