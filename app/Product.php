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

    public function reviews() {
        return $this->hasMany('App\ProductReview');
    }

    public function userReview() {
        return $this->hasMany(ProductReview::class)->where('user_id', auth()->user()->id);
    }

}