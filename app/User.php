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
        'name', 'email', 'password', 'avatar', 'role_id', 'city_id', 'address', 'proficiency_id', 'phone'
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


    public function socialProviders() {
        return $this->hasMany(SocialProvider::class);
    }

    public function products() {
        return $this->hasMany('App\Product');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function consultancies() {
        return $this->hasMany('App\Consultancy');
    }

    public function messages() {
        return $this->hasMany('App\PrivateMessage');
    }
}
