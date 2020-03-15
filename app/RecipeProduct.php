<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResipeProduct extends Model
{
    protected $table = 'recipes_products';
    public $timestamps = false;
    // protected $fillable = ['name', 'slug', 'img'];
    
    public function products()
    {
        return $this->belongsToMany('App\Product','recipes_products','recipe_id','product_id');
    }
}
