<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';
    // protected $primaryKey = 'id';
    protected $fillable = [
        
        'name',
        'slug',
        'describe',
        'image',
        'likes',
        'user_id',
        'category_id',
        'steps',
        'count',
        'unit'
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
        return $this->belongsToMany('App\Product','recipes_products','recipe_id','product_id')->withPivot('count','unit');
    }
    public function comment()
    {
        return $this->hasMany('App\Comment','recipe_id', 'id');///в таюлицу с рецептом писать ser id
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ? \Str::slug($value, '-') : \Str::slug($this->attributes['name'],'-');
    }
    public function stepImages()
    {
        return $this->ManyToMany('App\ImageRecipe','id','recipe_id');
    }
    public function likes()
    {
        return $this->hasMany('App\Likes', 'recipe_id', 'id');
    }
    public function steps()
    {
        return $this->hasMany('App\Steps');
    }
    
    public function getLikesByUserAttribute(){
        return  auth()->user() ? $this->likes->contains('user_id', auth()->user()->id) : false;
    }
    public function getIMGAttribute($value)
    {
        return $value ? $value : 'images/no-image.png';
    }
   
}
