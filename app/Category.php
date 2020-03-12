<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = ['name', 'slug', 'img'];
    
    public function recipe()
    {
        return $this->belongsToMany('App\Recipe','recipes_categories','category_id','recipe_id');
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ? \Str::slug($value, '-') : \Str::slug($this->attributes['name'],'-');
    }
}
