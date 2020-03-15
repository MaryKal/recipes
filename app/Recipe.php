<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';
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
    public function users()
    {
        return $this->belongsToMany('App\User','recipes_users','recipe_id','user_id');
    }
    public function products()
    {
        return $this->belongsToMany('App\Product','recipes_products','recipe_id','product_id');
    }
   
}
