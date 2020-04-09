<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageRecipe extends Model
{
    protected $table = 'step_images';

    public function recipes()
    {
        return $this->ManyToMany('App\Recipe','recipe_id','id');
        
    }
    public function images()
    {
        return $this->ManyToMany('App\Image','image_id','id');
    }
}
