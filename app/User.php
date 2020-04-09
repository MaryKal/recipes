<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function recipe()
    {
        return $this->hasMany('App\Recipe','user_id', 'id');///в таюлицу с рецептом писать ser id
    }
    public function comment()
    {
        return $this->hasMany('App\Comment','user_id', 'id');///в таюлицу с рецептом писать ser id
    }
    public function isAdmin()
    {
        return $this->role == 'admin' ? true : false;
    }
    public function isUser()
    {
        return $this->role == null ? true : false;
    }
}
