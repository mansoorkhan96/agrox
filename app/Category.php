<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products() {
        return $this->belongsToMany('App\Product');
    }
}
