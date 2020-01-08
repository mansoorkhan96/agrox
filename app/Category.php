<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products() {
        return $this->belongsToMany('App\Product');
    }

    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}
