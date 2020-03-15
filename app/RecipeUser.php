<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResipeUser extends Model
{
    protected $table = 'recipes_users';
    public $timestamps = false;



    public function users()
    {
        return $this->belongsToMany('App\User','recipes_users','recipe_id','user_id');
    }
}
