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
        'user_id',
        'category_id'
    ];
    public function categories()
    {
        return $this->hasOne('App\Category', 'id','category_id');
    }
    public function users()
    {
        return $this->hasOne('App\User','id', 'user_id');
    }
    public function products()
    {
        return $this->belongsToMany('App\Product','recipes_products','recipe_id','product_id');
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ? \Str::slug($value, '-') : \Str::slug($this->attributes['name'],'-');
    }
   
}
