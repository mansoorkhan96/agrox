<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultancy extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function consultant() {
        return $this->belongsTo('App\User', 'consultant');
    }

    public function consumer() {
        return $this->belongsTo('App\User', 'consumer');
    }
}
