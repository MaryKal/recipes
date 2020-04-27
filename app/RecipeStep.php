<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeStep extends Model
{
    protected $table = 'recipe_steps';
    protected $fillable =[
        'step_id',
        'recipe_id',
        
    ];

    public function steps()//id step
    {
        return $this->belongsToMany('App\Recipe')->withPivot('step_id','recipe_id');
    }
    public function recipes()//id recipe
    {
        return $this->belongsToMany('App\Step')->withPivot('step_id','recipe_id');
    }
}
