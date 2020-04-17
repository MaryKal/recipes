<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeProduct extends Model
{
    protected $table = 'recipes_products';
    public $timestamps = false;
    protected $fillable = ['recipe_id', 'product_id', 'count', 'unit'];
    
    public function products()
    {
        return $this->belongsToMany('App\Product','recipes_products','recipe_id','product_id')->withPivot('count','unit');
    }
    public function recipes()
    {
        return $this->belongsToMany('App\Recipe','recipes_products','recipe_id','product_id')->withPivot('count','unit');
    }
}
