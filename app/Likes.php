<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'likes';
    public $timestamps = false;
    protected $fillable =[
        'user_id',
        'recipe_id'
    ];

    public function recipes()
    {
        return $this->belongsToMany('App\Recipe', 'id', 'recipe_id');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','id', 'user_id');
    }
    public function isLiked()
    {
        return $this->user_id == auth()->user()->id ? true : false;
    }
}
