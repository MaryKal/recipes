<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
    protected $table = 'steps';
    protected $fillable =[
        'step',
        'image',
        'recipe_id'
        
    ];

    public function recipes()
    {
        return $this->belongsToMany('App\Recipe');
    }
    
}
