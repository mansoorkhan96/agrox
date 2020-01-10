<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public function userRating() {
        return $this->hasMany(Rating::class)->where('user_id', 12);
    }

    public function ratings() {
        return $this->hasMany('App\Rating');
    }
}
