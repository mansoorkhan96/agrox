<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function post() {
        return $this->belongsTo('App\Post');
    }
}
