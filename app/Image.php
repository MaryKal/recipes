<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'path',
        'recipe_id',
    ];

    public function stepImages()
    {
        return $this->ManyToMany('App\ImageRecipe','id','image_id');
    }
}
