<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'text',
        'user_id',
        'recipe_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User','id', 'user_id');
    }
    public function recipe()
    {
        return $this->hasOne('App\Recipe', 'id','recipe_id');
    }
}
