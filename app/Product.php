<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
