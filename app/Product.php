<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    // protected $primaryKey = 'id';
    protected $fillable =[
        'name',
    ];

    public function products()
    {
        return $this->manyToMany('App\Recipe')->withPivot('count','unit');
        
    }
}
