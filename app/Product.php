<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
